<?php

namespace Tenbajt\Services\Woocommerce;

use Tenbajt\Models\Woocommerce\GeneralSettingField;

class GeneralSettingFields extends SettingFields
{
    /**
     * Create a new general setting fields instance.
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct('general');
    }

    /**
     * Create and return an un-saved general setting field instance.
     * 
     * @param  string  $id
     * @return GeneralSettingField
     */
    protected function newFieldInstance(string $id): GeneralSettingField
    {
        return GeneralSettingField::make($id);
    }
}