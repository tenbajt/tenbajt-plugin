<?php

namespace Tenbajt\Illuminate\Support\Facades;

class App extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'app';
    }
}