<?php

namespace Tenbajt\Events\Hooks;

use Tenbajt\Events\Dispatchable;

class DisplayBlockEditor extends Dispatchable
{
    /**
     * WordPress hook tag.
     * 
     * @var string
     */
    protected $tag = 'use_block_editor_for_post_type';

    /**
     * Current state.
     * 
     * @var bool
     */
    protected $enabled;

    /**
     * Post type name.
     * 
     * @var string
     */
    protected $postType;

    /**
     * Create a new event instance.
     * 
     * @param  bool  $enabled
     * @param  string  $postType
     * @return void
     */
    public function __construct($enabled, $postType)
    {
        $this->enabled = $enabled;
        $this->postType = $postType;
    }
}