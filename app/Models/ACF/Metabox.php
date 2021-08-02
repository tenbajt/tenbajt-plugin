<?php

namespace Tenbajt\Models\ACF;

use Tenbajt\Models\Model;
use Illuminate\Support\Str;

class Metabox extends Model
{
    /**
     * The metabox's default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'key' => '',
        'title' => 'Własne pola',
        'style' => 'default',
        'fields' => [],
        'location' => [],
        'position' => 'normal',
        'menu_order' => 0,
        'hide_on_screen' => [
            'slug',
            'author',
            'comments',
            'revisions',
            'discussion',
            'the_content',
            'featured_image',
        ],
        'label_placement' => 'left',
        'instruction_placement' => 'label',
    ];

    /**
     * Set the metabox's key attribute.
     * 
     * @param  string  $key
     * @return void
     */
    public function setKeyAttribute(string $key): void
    {
        $this->attributes['key'] = "group_{$key}";
    }

    /**
     * Set the metabox's location attribute.
     * 
     * @param  array  $location
     * @return void
     */
    public function setLocationAttribute(array $location): void
    {
        if (! is_array($location[0])) {
            $location = [$location];
        }

        if (! is_array($location[0][0])) {
            $location = [$location];
        }

        foreach ($location as &$rules) {
            foreach ($rules as &$rule) {
                [$type, $value, $operator] = $rule;

                $operator = $operator ?: '==';

                $rule = [
                    'menu_item' => [
                        'param' => 'nav_menu_item',
                        'value' => "location/{$value}",
                        'operator' => $operator,
                    ],
                    'post_type' => [
                        'param' => 'post_type',
                        'value' => $value,
                        'operator' => $operator,
                    ],
                    'page_template' => [
                        'param' => 'page_template',
                        'value' => "page-templates/{$value}.php",
                        'operator' => $operator,
                    ],
                ][$type];
            }
        }

        $this->attributes['location'] = $location;
    }

    /**
     * Save the metabox.
     * 
     * @return void
     */
    public function save(): void
    {
        acf_add_local_field_group($this->toArray());
    }
}