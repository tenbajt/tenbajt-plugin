<?php

namespace Tenbajt\Services;

use Tenbajt\Models\CartItemModel as CartItem;

class CartService extends Service
{
    /**
     * @return array
     */
    protected function getItems(): array
    {
        $items = WC()->cart->get_cart();

        foreach ( $items as &$item )
        {
            $item = new CartItem( $item );
        }
        
        return $items;
    }
}