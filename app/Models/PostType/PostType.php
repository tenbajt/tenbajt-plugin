<?php

namespace Tenbajt\Models\PostType;

use Tenbajt\Models\Model;

class PostType extends Model
{
    /**
     * The post type's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'labels' => [],
        'show_ui' => false,
        'menu_icon' => 'dashicons-admin-post',
        'menu_position' => 20,
    ];

    /**
     * Set the post type's labels attribute.
     * 
     * @param  string[]  $labels
     * @return void
     */
    public function setLabelsAttribute(array $labels): void
    {
        $this->attributes['labels'] = PostTypeLabels::make($labels);
    }

    /**
     * Register the post type.
     * 
     * @return WP_Post_Type|WP_Error
     */
    public function save()
    {
        return register_post_type($this->name, $this->toArray());
    }
}