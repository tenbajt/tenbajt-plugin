<?php

namespace Tenbajt\Models\Woocommerce;

use Closure;
use Tenbajt\Facades\Woocommerce\GeneralSettingFields;

class GeneralSettingField extends SettingField
{
    /**
     * Save the general setting field.
     * 
     * @return void
     */
    public function save(): void
    {
        GeneralSettingFields::booted(function ($instance): void {
            $instance->splice($this->order, 0, [$this]);
        });
    }

    /**
     * Delete the general setting field.
     * 
     * @return void
     */
    public function delete(): void
    {
        GeneralSettingFields::booted(function ($instance): void {
            $instance->forget($instance->search($this));
        });
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
        GeneralSettingFields::booted(function ($instance) use ($id, $callback): void {
            $callback($instance->firstWhere('id', $id));
        });
    }
}