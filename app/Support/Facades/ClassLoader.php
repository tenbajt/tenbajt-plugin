<?php

namespace Tenbajt\Support\Facades;

use Illuminate\Support\Facades\Facade;

class ClassLoader extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'class.loader';
    }
}