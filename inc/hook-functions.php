<?php
/**
 * Enqueue a CSS stylesheets.
 * 
 * @param  array  $styles
 * @return void
 */
function tb_enqueue_styles(array $styles): void {
    $default_attributes = [
        'media' => 'all',
        'source' => '',
        'version' => false,
        'dependencies' => [],
    ];

    foreach ($styles as $id => $attributes) {
        $attributes = array_merge($default_attributes, $attributes);

        wp_enqueue_style($id, $attributes['source'], $attributes['dependencies'], $attributes['version'], $attributes['media']);
    }
}

/**
 * Enqueue a JS scripts.
 * 
 * @param  array  $scripts
 * @return void
 */
function tb_enqueue_scripts(array $scripts): void {
    $default_attributes = [
        'source' => '',
        'footer' => true,
        'version' => false,
        'dependencies' => [],
    ];

    foreach ($scripts as $id => $attributes) {
        $attributes = array_merge($default_attributes, $attributes);

        wp_enqueue_script($id, $attributes['source'], $attributes['dependencies'], $attributes['version'], $attributes['footer']);
    }
}

/**
 * Register ACF metabox.
 * 
 * @param  array  $attributes
 * @return void
 */
function tb_register_acf_metabox(array $attributes): void {
    $default_attributes = [
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
    ];

    acf_add_local_field_group(array_merge($default_attributes, $attributes));
}

/**
 * Register ACF file field.
 * 
 * @param  array  $attributes
 * @return void
 */
function tb_register_acf_file_field(array $attributes): void {
    $default_attributes = [
        'type' => 'file',
        'name' => 'file',
        'label' => 'Plik',
        'mime_types' => 'pdf',
    ];

    acf_add_local_field(array_merge($default_attributes, $attributes));
}

/**
 * Register ACF repeater field.
 * 
 * @param  array  $attributes
 * @return void
 */
function tb_register_acf_repeater_field(array $attributes): void {
    acf_add_local_field(array_merge($default_attributes, $attributes));
}

/**
 * Register ACF fields.
 * 
 * @param  array  $defaults
 * @return void
 */
function register_acf_fields(object $defaults): void
{
    $fields = apply_filters("tenbajt/acf/fields/type={$defaults->type}", []);

    foreach ($fields as $field) {
        // Apply default attributes and cast to object.
        $field = (object) array_merge((array) $defaults, $field);

        // Resolve key from name and parent's key.
        $field->key = "field_{$field->parent}_{$field->name}";

        acf_add_local_field((array) $field);
    }
}