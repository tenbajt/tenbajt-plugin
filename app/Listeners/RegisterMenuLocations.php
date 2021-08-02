<?php

namespace Tenbajt\Listeners;

use Tenbajt\Services\MenuLocations;

class RegisterMenuLocations
{
    /**
     * Menu locations service.
     * 
     * @var \Tenbajt\Services\MenuLocations
     */
    protected $locations;

    /**
     * Create a new listener instance.
     * 
     * @param  \Tenbajt\Services\MenuLocations  $locations
     * @return void
     */
    public function __construct(MenuLocations $locations)
    {
        $this->locations = $locations;
    }

    /**
     * Handle the event.
     * 
     * @return void
     */
    public function handle()
    {
        // This method should be overwriten.
    }
}