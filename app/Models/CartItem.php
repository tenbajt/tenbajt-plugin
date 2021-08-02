<?php

namespace Tenbajt\WooCommerce\Models;

use WC_Product;
use Tenbajt\Models\Model;
use Tenbajt\WooCommerce\Services\Options as WooCommerceOptions;

class CartItem extends Model
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @param string $key - WooCommerce cart item unique key.
     * 
     * @return self
     */
    public function __construct( Product $product, int $quantity )
    {
        $this->product  = $product;
        $this->quantity = $quantity;
        
        $this->total_price_excluding_tax = resolveTotalPriceExcludingTax( $product, $quantity );
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getTotalPriceExcludingTax(): float
    {
        return wc_price( wc_get_price_excluding_tax( $this->getProduct(),
            [
                'qty' => $this->getQuantity(),
            ]
        ));
    }

    /**
     * @return float
     */
    public function getTotalPriceIncludingTax(): float
    {
        return wc_price( wc_get_price_including_tax( $this->getProduct(),
            [
                'qty' => $this->getQuantity(),
            ]
        ));
    }

    /**
     * @return string
     */
    protected function formatPrice( float $price ): string
    {
        return number_format( $price, 2, WooCommerce::decimalSeparator(), WooCommerce::thousandSeparator() ) . ' ' . WooCommerce::currencySymbol();
    }
} 