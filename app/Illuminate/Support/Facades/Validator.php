<?php

namespace Tenbajt\Illuminate\Support\Facades;

class Validator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Tenbajt\Illuminate\Validation\Factory::class;
    }
}
    