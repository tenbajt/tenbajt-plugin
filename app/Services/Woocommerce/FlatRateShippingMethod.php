<?php

namespace Tenbajt\Services\Woocommerce;

use WC_Shipping_Flat_Rate;

class FlatRateShippingMethod extends WC_Shipping_Flat_Rate
{
    public function init() {
		$this->instance_form_fields = WC()->plugin_path() . '/includes/settings-flat-rate.php';
		$this->title                = $this->get_option( 'title' );
		$this->tax_status           = $this->get_option( 'tax_status' );
		$this->cost                 = $this->get_option( 'cost' );
		$this->type                 = $this->get_option( 'type', 'class' );
	}
}