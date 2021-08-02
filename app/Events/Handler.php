<?php

namespace Tenbajt\Events;

use Closure;
use ReflectionClass;
use Illuminate\Support\Facades\App;

class Handler
{
    /**
     * Create a new event handler instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Hook event with the given listener.
     * 
     * @param  string  $event
     * @param  \Closure  $callback
     * @return void
     */
    public function hook($event, $listener)
    {
        [$tag, $priority, $payloadCount] = $this->parseEvent($event);

        $listener = $this->makeListener($event, $listener);

        add_filter($tag, $listener, $priority, $payloadCount);
    }

    /**
     * Parse event into tag and payload count.
     * 
     * @param  string  $event
     * @return array
     */
    protected function parseEvent($event)
    {
        $reflector = new ReflectionClass($event);

        ['tag' => $tag, 'priority' => $priority] = $reflector->getDefaultProperties();

        $payloadCount = $reflector->getConstructor() ? $reflector->getConstructor()->getNumberOfParameters() : 0;

        return [$tag, $priority, $payloadCount];
    }

    /**
     * Make listener closure.
     * 
     * @param  string  $event
     * @param  string  $listener
     * @return \Closure
     */
    protected function makeListener($event, $listener)
    {
        return function() use ($event, $listener) {
            return App::call($listener, ['event', new $event(...func_get_args())]);
        };
    }
}