<?php

namespace Tenbajt\Services;

class Theme extends Service
{
    /**
     * WordPress theme.
     * 
     * @var WP_Theme
     */
    protected $theme;

    /**
     * Create theme service instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->theme = wp_get_theme();
    }

    /**
     * Return theme's directory name.
     * 
     * @return string
     */
    public function directoryName(): string
    {
        return get_stylesheet();
    }

    /**
     * Return path to the theme's root directory with optional append.
     * 
     * @param  string  $append
     * @return string
     */
    public function path(string $append = ''): string
    {
        $path = get_stylesheet_directory();

        if (! empty($append)) {
            $path .= '/'.$append;
        }

        return $path;
    }

    /**
     * Return URL to the theme's root directory.
     * 
     * @return string
     */
    public function getURL(): string
    {
        return get_stylesheet_directory_uri();
    }

    /**
     * Return URL to the theme's parent root directory.
     * 
     * @return string
     */
    public function getParentURL(): string
    {
        return get_template_directory_uri();
    }

    /**
     * Return theme's version.
     * 
     * @return string
     */
    public function version(): string
    {
        return $this->theme->get('Version');
    }
}