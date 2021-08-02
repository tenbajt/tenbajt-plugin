<?php

namespace Tenbajt\Facades;

use Illuminate\Support\Facades\Facade;

class AdminBar extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Tenbajt\Services\AdminBar::class;
    }
}