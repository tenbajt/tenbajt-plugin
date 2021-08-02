<?php

namespace Tenbajt\Models;

use Illuminate\Support\Collection;

class MenuLocation extends Model
{
    /**
     * The menu location's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'id' => '',
        'label' => '',
    ];
    
    /**
     * Register the menu location.
     * 
     * @return void
     */
    public function save(): void
    {
        register_nav_menu($this->id, $this->label);
    }

    /**
     * Unregister the menu location.
     * 
     * @return void
     */
    public function delete(): void
    {
        unregister_nav_menu($this->id);
    }

    /**
     * Get all of the menu locations.
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function all(): Collection
    {
        $menuLocations = collect([]);

        foreach (get_registered_nav_menus() as $id => $label) {
            $menuLocations->put($id, static::make([
                'id' => $id,
                'label' => $label,
            ]));
        }

        return $menuLocations;
    }
}