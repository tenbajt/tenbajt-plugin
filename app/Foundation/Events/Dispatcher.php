<?php

namespace Tenbajt\Foundation\Events;

use ReflectionClass;
use Illuminate\Events\Dispatcher as DispatcherContract;
use Illuminate\Support\Arr;

class Dispatcher extends DispatcherContract
{
    /**
     * Register an event listener with the dispatcher.
     *
     * @param  \Closure|string|array  $events
     * @param  \Closure|string|array|null  $listener
     * @return void
     */
    public function listen($events, $listener = null)
    {
        parent::listen($events, $listener);

        foreach ((array) $events as $event) {
            [$tag, $priority, $payloadCount] = $this->parseEvent($event);

            $priority = $this->parseListener($listener) ?: $priority;

            add_filter($tag, [$event, 'dispatch'], $priority, $payloadCount);
        }
    }

    /**
     * Parse event into tag, priority and payload count.
     * 
     * @param  string  $event
     * @return array
     */
    protected function parseEvent($event)
    {
        $event = new ReflectionClass($event);

        ['tag' => $tag, 'priority' => $priority] = $event->getDefaultProperties();

        $payloadCount = $event->getConstructor() ? $event->getConstructor()->getNumberOfParameters() : 0;

        return [$tag, $priority, $payloadCount];
    }

    /**
     * Parse listener into priority.
     * 
     * @param  string  $listener
     * @return int|null
     */
    protected function parseListener($listener)
    {
        return (new ReflectionClass($listener))->getDefaultProperties()['priority'];
    }

    /**
     * Fire an event and call the listeners.
     *
     * @param  string|object  $event
     * @param  mixed  $payload
     * @param  bool  $halt
     * @return mixed
     */
    public function dispatch($event, $payload = [], $halt = false)
    {
        // When the given "event" is actually an object we will assume it is an event
        // object and use the class as the event name and this event itself as the
        // payload to the handler, which makes object based events quite simple.
        [$event, $payload] = $this->parseEventAndPayload(
            $event, $payload
        );

        if ($this->shouldBroadcast($payload)) {
            $this->broadcastEvent($payload[0]);
        }

        $responses = [];

        foreach ($this->getListeners($event) as $listener) {
            $response = $listener($event, $payload);

            // If a response is returned from the listener and event halting is enabled
            // we will just return this response, and not call the rest of the event
            // listeners. Otherwise we will add the response on the response list.
            if ($halt && ! is_null($response)) {
                return $response;
            }

            // If a boolean false is returned from a listener, we will stop propagating
            // the event to any further listeners down in the chain, else we keep on
            // looping through the listeners and firing every one in our sequence.
            /*if ($response === false) {
                break;
            }*/

            $responses[] = $response;
        }

        return $halt ? null : Arr::last($responses);
    }
}