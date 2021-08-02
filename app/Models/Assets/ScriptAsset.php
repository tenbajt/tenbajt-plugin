<?php

namespace Tenbajt\Models\Assets;

use Tenbajt\Models\Model;

class ScriptAsset extends Model
{
    /**
     * The style asset's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'id' => '',
        'source' => '',
        'footer' => true,
        'version' => null,
        'dependencies' => [],
    ];

    /**
     * Enqueue the script asset.
     * 
     * @return void
     */
    public function save(): void
    {
        wp_enqueue_script($this->id, $this->source, $this->dependencies, $this->version, $this->footer);
    }
}