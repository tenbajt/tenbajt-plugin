<?php

namespace Tenbajt\Models\WooCommerce;

use WC_Product;
use Tenbajt\Models\Model;

class Product extends Model
{
    /**
     * The WooCommerce product instance.
     * 
     * @var WC_Product
     */
    protected $product;

    /**
     * Create a new product instance.
     * 
     * @param  WC_Product  $product
     * @return void
     */
    public function __construct(WC_Product $product)
    {
        $this->product = $product;
    }

    /**
     * Update product meta data.
     * 
     * @param  string  $id
     * @param  mixed  $value
     * @return void
     */
    public function update(string $id, $value): void
    {
        $this->product->update_meta_data($id, wc_clean(wp_unslash($value)));
    }

    /**
     * Find a product by its id.
     *
     * @param  int  $id
     * @return \Tenbajt\Models\WooCommerce\Product
     */
    public static function find(int $id): Product
    {
        return static::make(wc_get_product($id));
    }
}