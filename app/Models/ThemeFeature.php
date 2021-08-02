<?php

namespace Tenbajt\Models;

class ThemeFeature extends Model
{
    /**
     * The theme feature's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'settings' => []
    ];
    
    /**
     * Save the theme feature.
     * 
     * @return void
     */
    public function save(): void
    {
        add_theme_support($this->name, $this->settings);
    }
}