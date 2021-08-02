<?php

namespace Tenbajt\Services;

class BlockEditor extends Service
{
    /**
     * An array of post types for which the block editor is enabled.
     * 
     * @var array
     */
    protected $enabled = [];

    /**
     * Enabled the block editor for the given post type.
     * 
     * @param  string  $postType
     * @return $this
     */
    public function enable(string $postType): BlockEditor
    {
        $this->enabled[] = $postType;

        return $this;
    }

    /**
     * Determine whether the block editor is enabled for the given post type.
     * 
     * @param  bool  $enabled
     * @param  string  $postType
     * @return bool
     */
    public function isEnabled(bool $enabled, string $postType): bool
    {
        return in_array($postType, $this->enabled);
    }
}