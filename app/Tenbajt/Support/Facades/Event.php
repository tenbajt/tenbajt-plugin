<?php

namespace Tenbajt\Tenbajt\Support\Facades;

use Tenbajt\Illuminate\Support\Facades\Facade;

class Event extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Tenbajt\Tenbajt\Events\Dispatcher::class;
    }
}