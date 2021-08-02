<?php

namespace Tenbajt\Services\Woocommerce;

use Tenbajt\Models\Woocommerce\AccountSettingField;

class AccountSettingFields extends SettingFields
{
    /**
     * Create a new account setting fields instance.
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct('account');
    }

    /**
     * Create and return an un-saved general setting field instance.
     * 
     * @param  string  $id
     * @return AccountSettingField
     */
    protected function newFieldInstance(string $id): AccountSettingField
    {
        return AccountSettingField::make($id);
    }
}