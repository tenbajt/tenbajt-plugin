<?php

namespace Tenbajt\Events;

class WoocommerceGeneralSettings
{
    /**
     * The WooCommerce's general setting fields.
     * 
     * @var \Illuminate\Support\Collection
     */
    protected $fields;

    /**
     * Create a new event instance.
     * 
     * @param  array  $settings
     * @return void
     */
    public function __construct(array $fields)
    {
        $fields = collect($settings);


    }

    public static function hook(Closure $closure): void
    {
        add_filter('woocommerce_general_settings', function (array $fields) use ($closure): array {
            
        });
    }
}