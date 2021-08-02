<?php

namespace Tenbajt\Services\Woocommerce;

use Closure;
use Tenbajt\Models\Woocommerce\SettingField;

class SettingFields
{
    /**
     * An array of setting fields.
     * 
     * @var Collection
     */
    protected $fields;

    /**
     * Indicates if the general setting fields has "booted".
     * 
     * @var bool
     */
    protected $booted = false;

    /**
     * An array of "booted" listeners.
     *
     * @var Closure[]
     */
    protected $bootedListeners = [];

    /**
     * Create a new setting fields service instance.
     * 
     * @param  string  $hook
     * @return void
     */
    public function __construct(string $id = '')
    {
        add_filter("woocommerce_{$id}_settings", [$this, 'boot']);
    }

    /**
     * Boot the setting fields service.
     * 
     * @param  array  $settings
     * @return array
     */
    public function boot(array $settings): array
    {
        $this->fields = collect([]);
        
        foreach ($settings as $attributes) {
            $field = $this->newFieldInstance($attributes['id']);

            // Remove 'id' attributes as it is passed directly to the constructor and doesn't have setter.
            unset($attributes['id']);

            // Go over each attribute and set it for the field, so only existing ones are passed.
            foreach ($attributes as $key => $value) {
                $field->$key = $value;
            }

            $this->push($field);
        }

        $this->booted = true;

        $this->fireListeners($this->bootedListeners);

        return $this->toArray();
    }

    /**
     * Create and return an un-saved setting field instance.
     * 
     * @param  string  $id
     * @return SettingField
     */
    protected function newFieldInstance(string $id): SettingField
    {
        return SettingField::make($id);
    }

    /**
     * Determine if the general setting fields has booted.
     * 
     * @return bool
     */
    public function isBooted(): bool
    {
        return $this->booted;
    }

    /**
     * Register a new "booted" listener.
     * 
     * @param  Closure  $listener
     * @return void
     */
    public function booted(Closure $listener): void
    {
        $this->bootedListeners[] = $listener;

        if ($this->isBooted()) {
            $this->fireListeners([$listener]);
        }
    }

    /**
     * Call the listeners for the service.
     * 
     * @param  Closure[]  $filters
     * @return void
     */
    protected function fireListeners(array $listeners): void
    {
        foreach ($listeners as $listener) {
            $listener($this);
        }
    }

    /**
     * Handle dynamic method calls into the service.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return $this->fields->$method(...$parameters);
    }
}