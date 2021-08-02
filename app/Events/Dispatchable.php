<?php

namespace Tenbajt\Events;

use Closure;
use Tenbajt\Support\Facades\Event;

class Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = __CLASS__;

    /**
     * WordPress hook priority.
     * 
     * @var int
     */
    protected $priority = 10;

    /**
     * Hook the event with the given listener.
     * 
     * @param  \Closure
     */
    public static function hook($closure)
    {
        Event::hook(static::class, $closure);
    }
}