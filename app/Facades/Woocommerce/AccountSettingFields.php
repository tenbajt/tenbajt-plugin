<?php

namespace Tenbajt\Facades\Woocommerce;

use Illuminate\Support\Facades\Facade;

class AccountSettingFields extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Tenbajt\Services\Woocommerce\AccountSettingFields::class;
    }
}