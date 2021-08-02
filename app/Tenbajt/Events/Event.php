<?php

namespace Tenbajt\Tenbajt\Events;

class Event
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
     * Fire WordPress action hook.
     * 
     * @return void
     */
    public static function fire(): void
    {
        Event::fire(static::class, ...func_get_args());
    }

    /**
     * Fire WordPress filter hook.
     * 
     * @return mixed
     */
    public static function filter()
    {
        return Event::filter(static::class, ...func_get_args());
    }
}