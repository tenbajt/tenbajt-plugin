<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class UrlField extends Field
{
    /**
     * The field's name for saving and retriving data.
     * 
     * @var string
     */
    protected $name = 'url';

    /**
     * The field's type.
     * 
     * @var string
     */
    protected $type = 'url';

    /**
     * The field's label.
     * 
     * @var string
     */
    protected $label = 'Link';
}