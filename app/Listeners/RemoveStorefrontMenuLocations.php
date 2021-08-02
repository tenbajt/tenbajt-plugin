<?php

namespace Tenbajt\Listeners;

use Tenbajt\Events\StorefrontMenuLocationsResolved;

class RemoveStorefrontMenuLocations
{
    /**
     * Handle the event.
     * 
     * @param  StorefrontMenuLocationsResolved  $event
     * @return array
     */
    public function handle(StorefrontMenuLocationsResolved $event)
    {
        return [];
    }
}