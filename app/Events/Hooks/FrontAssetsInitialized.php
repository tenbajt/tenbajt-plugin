<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class FrontAssetsInitialized extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'wp_enqueue_scripts';

    /**
     * WordPress hook priority.
     * 
     * @var int
     */
    protected $priority = 11;
}