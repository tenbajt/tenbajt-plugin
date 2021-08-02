<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class TextField extends Field
{
    /**
     * The text field's name for saving and retriving data.
     * 
     * @var string
     */
    protected $name = 'text';

    /**
     * The text field's type.
     * 
     * @var string
     */
    protected $type = 'text';

    /**
     * The text field's label.
     * 
     * @var string
     */
    protected $label = 'Text';

    /**
     * The text field's append which appears after the input.
     * 
     * @var string
     */
    protected $append = '';

    /**
     * The text field's prepend which appears before the input.
     * 
     * @var string
     */
    protected $prepend = '';

    /**
     * The text field's enabled state.
     * 
     * @var bool
     */
    protected $enabled = true;

    /**
     * The text field's read-only status.
     * 
     * @var bool
     */
    protected $readonly = false;

    /**
     * The text field's character limit.
     * 
     * @var int
     */
    protected $maxLength = 0;

    /**
     * The text field's placeholder.
     * 
     * @var string
     */
    protected $placeholder = '';

    /**
     * Set text field's placeholder.
     * 
     * @param  string  $placeholder
     * @return \Tenbajt\Models\ACF\Fields\TextField
     */
    public function setPlaceholder(string $placeholder): TextField
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Build an array in ACF format from the field instance.
     * 
     * @param  \Tenbajt\Models\ACF\Metabox|\Tenbajt\Models\ACF\Field  $parent
     * @return array
     */
    public function build(object $parent): array
    {
        $this->enabled = ! $this->enabled;
        $this->maxLength = $this->maxLength ?: '';

        return array_merge(parent::build($parent), [
            'append' => $this->append,
            'prepend' => $this->prepend,
            'disabled' => $this->enabled,
            'readonly' => $this->readonly,
            'maxlength' => $this->maxLength,
            'placeholder' => $this->placeholder,
        ]);
    }
}