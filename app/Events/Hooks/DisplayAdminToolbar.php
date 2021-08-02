<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class DisplayAdminToolbar extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'show_admin_bar';
}