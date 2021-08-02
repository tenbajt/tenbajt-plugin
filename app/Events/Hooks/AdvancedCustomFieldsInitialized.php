<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class AdvancedCustomFieldsInitialized extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'acf/init';
}