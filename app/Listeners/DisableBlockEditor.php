<?php

namespace Tenbajt\Listeners;

use Tenbajt\Events\DisplayBlockEditor;

class DisableBlockEditor
{
    /**
     * Handle the event.
     * 
     * @param  \Tenbajt\Events\DisplayBlockEditor  $event
     * @return bool
     */
    public function handle(DisplayBlockEditor $event)
    {
        return false;
    }
}