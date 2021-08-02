<?php

namespace Tenbajt\Models\Woocommerce;

use Closure;
use Tenbajt\Facades\Woocommerce\FlatRateSettingFields;

class FlatRateSettingField extends Model
{
    /**
     * Save the flat rate setting field.
     * 
     * @return void
     */
    public function save(): void
    {
        FlatRateSettingFields::add($this);
    }
    
    /**
     * Find a general setting field by its ID and pass it to the given callback.
     * 
     * @param  string  $id
     * @param  Closure  $callback
     * @return void
     */
    public static function find(string $id, Closure $callback): void
    {
        FlatRateSettingFields::booted(function ($instance) use ($id, $callback): void {
            $callback($instance->get($id));
        });
    }
}