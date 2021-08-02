<?php

namespace Tenbajt\Services\Woocommerce;

use Tenbajt\Services\Service;

class ShippingMethods extends Service
{
    /**
     * An array of WooCommerce's shipping methods.
     * 
     * @var array
     */
    protected $methods = [];

    /**
     * Create a new shipping methods service instance.
     * 
     * @return void
     */
    public function __construct()
    {
        add_filter('woocommerce_shipping_methods', [$this, 'boot']);
    }

    /**
     * Boot the shipping methods service.
     * 
     * @param  array  $methods
     * @return array
     */
    public function boot(array $methods = []): array
    {
        $this->methods = $methods;

        $this->booted = true;

        $this->fireListeners($this->bootedListeners);

        return $this->methods;
    }

    /**
     * Add a shipping method.
     * 
     * @param  string  $id
     * @param  string  $method
     * @return void
     */
    public function add(string $id, string $method): void
    {
        $this->methods[$id] = $method;
    }

    /**
     * Delete a shipping methods with the given ID.
     * 
     * @param  string  $id
     * @return void
     */
    public function delete(string $id): void
    {
        unset($this->methods[$id]);
    }
}