<?php

namespace Tenbajt\Models\ACF;

use Tenbajt\Models\Model;
use Illuminate\Support\Str;

class Field extends Model
{
    /**
     * The field's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'key' => '',
        'name' => '',
        'type' => '',
        'label' => '',
        'parent' => '',
        'wrapper' => [],
        'required' => false,
        'instructions' => '',
        'default_value' => '',
        'conditional_logic' => false,
    ];

    /**
     * Set the field's key attribute.
     * 
     * @param  string  $key
     * @return void
     */
    public function setKeyAttribute(string $key): void
    {
        $this->attributes['key'] = "field_{$key}";
    }

    /**
     * Set the field's parent attribute.
     * 
     * @param  string  $parent
     * @return void
     */
    public function setParentAttribute(string $parent): void
    {
        //$this->attributes['parent'] = 
    }
}