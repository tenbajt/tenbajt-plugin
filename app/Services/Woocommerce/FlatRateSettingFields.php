<?php

namespace Tenbajt\Services\Woocommerce;

use Illuminate\Support\Collection;
use Tenbajt\Models\Woocommerce\ShippingMethodSettingField;

class FlatRateSettingFields extends Service
{
    /**
     * A collection of flat rate setting fields.
     * 
     * @var Collection
     */
    protected $fields;

    /**
     * Create a new flat rate shipping method form fields service instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->fields = collect([]);

        add_filter('woocommerce_shipping_instance_form_fields_flat_rate', [$this, 'boot']);
    }

    /**
     * Boot the flat rate setting fields service.
     * 
     * @param  array  $settings
     * @return array
     */
    public function boot(array $settings = []): array
    {
        foreach ($settings as $attributes) {
            $this->fields->push($this->makeField($attributes));
        }

        $this->booted = true;

        $this->fireListeners($this->bootedListeners);

        return $this->fields->toArray();
    }

    /**
     * Create a new shipping method setting field.
     * 
     * @param  array  $attributes
     * @return Model
     */
    public function createField(array $attributes): Model
    {
        $field = $this->makeField($attributes);

        $this->fields->put($field);
    }

    /**
     * Create and return an un-saved field instance.
     * 
     * @param  array  $attributes
     * @return Model
     */
    public function makeField(array $attributes = []): Model
    {
        return Model::make($attributes);
    }
}