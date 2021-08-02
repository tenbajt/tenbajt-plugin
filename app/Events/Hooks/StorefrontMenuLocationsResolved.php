<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;
use Illuminate\Support\Collection;

class StorefrontMenuLocationsResolved extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'storefront_register_nav_menus';

    /**
     * Locations.
     * 
     * @var \Illuminate\Support\Collection
     */
    protected $locations;

    /**
     * Create a new event instance.
     * 
     * @param  array  $locations
     * @return void
     */
    public function __construct($locations = [])
    {
        $this->locations = collect($locations);
    }
}