<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class TextAreaField extends Field
{
    /**
     * The text area field's name for saving and retriving data.
     * 
     * @var string
     */
    protected $name = 'text';

    /**
     * The text area field's type.
     * 
     * @var string
     */
    protected $type = 'textarea';

    /**
     * The text area field's label.
     * 
     * @var string
     */
    protected $label = 'Treść';

    /**
     * The text area field's input height by the number of lines.
     * 
     * @var int
     */
    protected $height = 5;

    /**
     * The text area field's enabled state.
     * 
     * @var bool
     */
    protected $enabled = true;

    /**
     * The text area field's read-only status.
     * 
     * @var bool
     */
    protected $readonly = false;

    /**
     * The text area field's character limit.
     * 
     * @var int
     */
    protected $maxLength = 0;

    /**
     * The text area field's placeholder.
     * 
     * @var string
     */
    protected $placeholder = '';

    /**
     * The text area field's new line render format.
     * Either 'wpautop' (automatically add <p>), 'br' (automatically add <br>) or '' (no formatting).
     */
    protected $newLineFormat = 'br';

    /**
     * Set the text area's input height.
     * 
     * @param  int  $height
     * @return \Tenbajt\Models\ACF\Fields\TextAreaField
     */
    public function setHeight(int $height): TextAreaField
    {
        $this->height = $height;

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
        $this->height = $this->height ?: '';
        $this->enabled = ! $this->enabled;
        $this->maxLength = $this->maxLength ? (string) $this->maxLength : '';

        return array_merge(parent::build($parent), [
            'rows' => $this->height,
            'disabled' => $this->enabled,
            'readonly' => $this->readonly,
            'maxlength' => $this->maxLength,
            'new_lines' => $this->newLineFormat,
            'placeholder' => $this->placeholder,
        ]);
    }
}