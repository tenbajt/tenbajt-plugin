<?php

namespace Tenbajt\Models\Woocommerce;

use WC_Product;
use Tenbajt\Models\Model;
use Tenbajt\Facades\Request;
use Tenbajt\Facades\Woocommerce\Settings;

class ProductPricingField extends Model
{
    /**
     * The field's field.
     * 
     * @var \Tenbajt\Models\WooCommerce\TextInputField
     */
    protected $field;

    /**
     * The WooCommerce currency setting.
     * 
     * @var string
     */
    protected $currencySymbol;

    /**
     * Create a new field instance.
     * 
     * @param  string  $id
     * @return void
     */
    public function __construct(string $id)
    {
        $this->field = TextInputField::make($id, 'price');
        $this->currencySymbol = Settings::currencySymbol();
    }

    /**
     * Set the field's label.
     * 
     * @param  string  $label
     * @return \Tenbajt\Models\WooCommerce\ProductPricingField
     */
    public function setLabel(string $label): ProductPricingField
    {
        $this->field->setLabel("{$label} ({$this->currencySymbol})");

        return $this;
    }

    /**
     * Render the product pricing field.
     * 
     * @return void
     */
    public function render(): void
    {
        $this->field->render();
    }

    /**
     * Save the product pricing field.
     * 
     * @param  WC_Product  $product
     * @return void
     */
    public function save(WC_Product $product): void
    {
        $product->update_meta_data($this->id, wc_clean(Request::input($this->id)));
    }

    /**
     * Dynamically pass calls to underlying field instance.
     * 
     * @param  string  $name
     * @param  array  $params
     * @return mixed
     */
    public function __call(string $name, array $params)
    {
        return $this->field->$name(...$params);
    }

    /**
     * Register a new product pricing field and return the instance.
     * 
     * @return \Tenbajt\Models\WooCommerce\Fields\ProductPricingField
     */
    public static function create(): ProductPricingField
    {
        return tap(static::make(...func_get_args()), function ($field) {
            add_action('woocommerce_product_options_pricing', [$field, 'render']);
            add_action('woocommerce_admin_process_product_object', [$field, 'save']);
        });
    }
}