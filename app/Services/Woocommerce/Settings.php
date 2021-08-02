<?php

namespace Tenbajt\Services\WooCommerce;

class Settings
{
    /**
     * Return WooCommerce currency symbol set in general settings.
     * 
     * @return string
     */
    public function currencySymbol(): string
    {
        return get_woocommerce_currency_symbol();
    }
}