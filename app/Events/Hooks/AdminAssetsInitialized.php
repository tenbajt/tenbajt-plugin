<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class AdminAssetsInitialized extends Dispatchable
{

    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'admin_enqueue_scripts';

    /**
     * WordPress hook priority.
     * 
     * @var int
     */
    protected $priority = 11;
}