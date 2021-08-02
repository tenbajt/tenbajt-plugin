<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class MenuLocationsInitialized extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'after_setup_theme';

    /**
     * WordPress hook priority.
     * 
     * @var int
     */
    protected $priority = 11;
}