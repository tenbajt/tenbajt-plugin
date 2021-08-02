<?php

namespace Tenbajt\Tenbajt\Events;

use Closure;
use Exception;
use ReflectionClass;
use Tenbajt\Illuminate\Support\Arr;
use Tenbajt\Illuminate\Container\Container;
use Tenbajt\Illuminate\Support\Facades\App;
use Tenbajt\Illuminate\Support\Traits\Macroable;
use Tenbajt\Illuminate\Support\Traits\ReflectsClosures;

class Dispatcher
{
    use Macroable, ReflectsClosures;

    /**
     * The IoC container instance.
     *
     * @var Container
     */
    protected $container;

    /**
     * The registered event listeners.
     *
     * @var array
     */
    protected $listeners = [];

    /**
     * Create a new event dispatcher instance.
     *
     * @param  Container  $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Register listeners with given events.
     *
     * @param  array  $events
     * @return void
     */
    public function listen($events): void
    {
        foreach ($events as $event => $listeners) {
            [$tag, $eventPriority, $payloadCount] = $this->parseEvent($event);

            foreach ($listeners as $listener) {
                $priority = $this->parseListener($listener) ?: $eventPriority;
                $listener = $this->makeListener($event, $listener);

                add_filter($tag, $listener, $priority, $payloadCount);
            }
        }
    }

    /**
     * Parse event into tag and payload count.
     * 
     * @param  string  $event
     * @return array
     */
    protected function parseEvent(string $event): array
    {
        $event = new ReflectionClass($event);

        ['tag' => $tag, 'priority' => $priority] = $event->getDefaultProperties();

        if (! $event->getConstructor()) {
            $payloadCount = 0;
        } else {
            $payloadCount = $event->getConstructor()->getNumberOfParameters();
        }

        return [$tag, $priority, $payloadCount];
    }

    /**
     * Parse listener into priority.
     * 
     * @param  string  $listener
     * @return int|null
     */
    protected function parseListener(string $listener)
    {
        return (new ReflectionClass($listener))->getDefaultProperties()['priority'];
    }

    /**
     * Make listener closure.
     * 
     * @param  string  $event
     * @param  string  $listener
     * @return Closure
     */
    protected function makeListener(string $event, string $listener): Closure
    {
        return function() use ($event, $listener) {
            return App::make($listener)->handle(new $event(...func_get_args()));
        };
    }

    /**
     * Fire WordPress action.
     * 
     * @param  string  $event
     * @return void
     */
    public function fire(string $event, ...$arg): void
    {
        do_action($event, ...$arg);
    }

    /**
     * Apply WordPress filter.
     * 
     * @param  string  $event
     * @param  mixed  $value
     * @return mixed
     */
    public function filter(string $event, $value)
    {
        return apply_filters($event, $value, ...func_get_args());
    }
}