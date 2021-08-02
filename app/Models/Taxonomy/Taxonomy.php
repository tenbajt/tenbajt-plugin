<?php

namespace Tenbajt\Models\Taxonomy;

use Tenbajt\Models\Model;

class Taxonomy extends Model
{
    /**
     * The taxonomy's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'labels' => [],
        'public' => true,
        'show_ui' => true,
        'post_types' => [],
        'meta_box_cb' => false,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'publicly_queryable' => true,
    ];

    /**
     * Set the taxonomy's labels attribute.
     * 
     * @param  string[]  $labels
     * @return void
     */
    public function setLabelsAttribute(array $labels): void
    {
        $this->attributes['labels'] = TaxonomyLabels::make($labels);
    }

    /**
     * Save the taxonomy.
     * 
     * @return WP_Taxonomy|WP_Error
     */
    public function save()
    {
        return register_taxonomy($this->name, $this->post_types, $this->toArray());
    }
}