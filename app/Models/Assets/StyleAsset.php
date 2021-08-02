<?php

namespace Tenbajt\Models\Assets;

use Tenbajt\Models\Model;

class StyleAsset extends Model
{
    /**
     * The style asset's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'id' => '',
        'media' => 'all',
        'source' => '',
        'version' => null,
        'dependencies' => [],
    ];

    /**
     * Enqueue the style asset.
     * 
     * @return void
     */
    public function save(): void
    {
        wp_enqueue_style($this->id, $this->source, $this->dependencies, $this->version, $this->media);
    }
}