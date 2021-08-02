<?php

namespace Tenbajt\WooCommerce\Models;

use WC_Product;
use Tenbajt\Models\Post;

class Product extends Post
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var WC_Product
     */
    protected $wc_product;

    /**
     * @param int $id
     * 
     * @return Product
     */
    public function __construct( int $id )
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->wc()->get_name();
    }

    /**
     * @return string
     */
    public function priceExcludingTax(): string
    {
        return wc_price( wc_get_price_excluding_tax( $this->wc() ) );
    }

    /**
     * @return string
     */
    public function priceIncludingTax(): string
    {
        return wc_price( wc_get_price_including_tax( $this->wc() ) );
    }

    /**
     * @return string
     */
    public function sku(): string
    {
        return $this->wc()->get_sku();
    }

    /**
     * @return WC_Product
     */
    public function wc(): WC_Product
    {
        return $this->wc_product ?: $this->wc_product = wc_get_product( $this->id() );
    }

    /**
     * @param int $id
     * 
     * @return Product
     */
    public static function find( int $id ): Product
    {
        return new static( $id );
    }
}