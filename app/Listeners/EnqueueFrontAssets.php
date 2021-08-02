<?php

namespace Tenbajt\Listeners;

use Tenbajt\Services\Theme;
use Tenbajt\Services\Assets;

class EnqueueFrontAssets
{
    /**
     * Assets service.
     * 
     * @var \Tenbajt\Services\Assets
     */
    protected $assets;

    /**
     * Theme service.
     * 
     * @var \Tenbajt\Services\Theme
     */
    protected $theme;

    /**
     * Create a new listener instance.
     * 
     * @param  \Tenbajt\Services\Assets  $assets
     * @param  \Tenbajt\Services\Theme  $theme
     * @return void
     */
    public function __construct(Assets $assets, Theme $theme)
    {
        $this->assets = $assets;
        $this->theme = $theme;
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