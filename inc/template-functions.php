<?php

namespace Tenbajt;

/**
 * Return url to theme's root directory with optional append.
 * 
 * @param  string  $append
 * @return string
 */
function theme_url(string $append = ''): string
{
    $url = get_stylesheet_directory_uri();

    if (! empty($append)) {
        $url .= '/'.$append;
    }

    return $url;
}

/**
 * Return theme directory name. If there is a child theme, that theme directory name will be returned.
 * 
 * @return string
 */
function get_theme_dir_name(): string
{
    return get_stylesheet();
}

/**
 * Return appended theme directory name. If there is a child theme, that theme directory name will be returned.
 * 
 * @param  string  $append
 * @param  string  $glue
 * @return string
 */
function make_theme_dir_name(string $append, string $glue): string
{
    return get_theme_dir_name() . $glue . $append;
}

/**
 * Return appended full URL to theme directory. If there is a child theme, that theme URL will be returned.
 * 
 * @param  string  $append
 * @return string
 */
function make_theme_url(string $append): string
{
    return get_theme_url() . $append;
}