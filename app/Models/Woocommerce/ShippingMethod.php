<?php

namespace Tenbajt\Models\Woocommerce;

class ShippingMethod extends Model
{
    /**
     * Delete the shipping method.
     * 
     * @return void
     */
    public function delete(): void
    {
        ShippingMethods::booted(function ($instance): void {
            $instance->delete($this);
        });
    }

    /**
     * Find a shipping method with the given ID.
     * 
     * @param  string  $id
     * @param  Closure  $callback
     * @return void
     */
    public static function find(string $id, Closure $callback): void
    {
        ShippingMethods::booted(function ($instance) use ($id, $callback): void {
            $callback($instance->get($id));
        });
    }
}