<?php

namespace Tenbajt\Models\Woocommerce;

use Closure;
use Tenbajt\Facades\Woocommerce\GeneralSettingSections;

class GeneralSettingSection extends SettingSection
{
    /**
     * Save the general settings section.
     * 
     * @return void
     */
    public function save(): void
    {
        GeneralSettingSections::addSection($this);
    }

    /**
     * Find a general settings section by its id.
     * 
     * @param  string  $id
     * @param  Closure  $callback
     * @return GeneralSettingSection
     */
    public static function find(string $id, Closure $callback): void
    {
        GeneralSettingSections::booted(function ($instance) use ($id, $callback): void {
            $callback($instance->getSection($id));
        });
    }
}