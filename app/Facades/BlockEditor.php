<?php

namespace Tenbajt\Facades;

use Illuminate\Support\Facades\Facade;

class BlockEditor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Tenbajt\Services\BlockEditor::class;
    }
}