<?php

namespace Tenbajt\WooCommerce\Services;

use Tenbajt\Services\Service;
use Tenbajt\WooCommerce\Models\CartItem;

class Cart extends Service
{
    /**
     * Tenbajt\WooCommerce\Models\CartItem
     * 
     * @var array
     */
    protected $items;

    /**
     * Tenbajt\WooCommerce\Models\Price
     * 
     * @var Price
     */
    protected $total;

    /**
     * Constructor.
     */
    public function __construct()
    {
        foreach ( WC()->cart->get_cart() as $key => $item )
        {
            $this->items[ $key ] = CartItem::make( $item );
        }


        $this->total = $this->resolveTotal( WC()->cart->get_subtotal() );
    }
}