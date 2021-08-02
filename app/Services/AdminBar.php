<?php

namespace Tenbajt\Services;

class AdminBar extends Service
{
    /**
     * Whether to show the admin bar on the front-end.
     * 
     * @var bool
     */
    protected $enabled = false;

    /**
     * Set whether to show the admin bar on the front-end.
     * 
     * @param  bool  $enable
     * @return $this
     */
    public function setEnabled(bool $enabled): AdminBar
    {
        $this->enabled = $enabled;
    }

    /**
     * Determine whether to show the admin bar on the front-end.
     * 
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}