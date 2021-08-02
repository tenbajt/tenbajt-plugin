<?php

namespace Tenbajt\Listeners;

use Tenbajt\Services\AdvancedCustomFields;

class RegisterAdvancedCustomFields
{
    /**
     * Advanced Custom Fields service instance.
     * 
     * @var \Tenbajt\Service\AdvancedCustomFields
     */
    protected $acf;

    /**
     * Create a new listener instance.
     * 
     * @param \Tenbajt\Service\AdvancedCustomFields
     * @return void
     */
    public function __construct(AdvancedCustomFields $acf)
    {
        $this->acf = $acf;
    }
}