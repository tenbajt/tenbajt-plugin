<?php

namespace Tenbajt\Models\ACF\Fields;

use InvalidArgumentException;
use Tenbajt\Models\ACF\Field;

class RepeaterField extends Field
{
    /**
     * The repeater field's minimum number of entries.
     */
    protected $min = 0;

    /**
     * The repeater field's maximum number of entries.
     * 
     * @var int
     */
    protected $max = 0;

    /**
     * The repeater field's type.
     * 
     * @var string
     */
    protected $type = 'repeater';

    /**
     * The repeater field's layout. Either 'table', 'block' or 'row'.
     * 
     * @var string
     */
    protected $layout = 'row';

    /**
     * The repeater field's child fields.
     * 
     * @var array
     */
    protected $fields = [];

    /**
     * The key of one of the sub-fields which will be show when entry is collapsed.
     * 
     * @var string
     */
    protected $collapsed = '';

    /**
     * The repeater field's 'Add new' button label.
     * 
     * @var string
     */
    protected $buttonLabel = 'Dodaj';

    /**
     * Set repeater field's layout.
     * 
     * @param  string  $layout
     * @return \Tenbajt\Models\ACF\Fields\RepeaterField
     * 
     * @throws \InvalidArgumentException
     */
    public function setLayout(string $layout): RepeaterField
    {
        if (! in_array($layout, ['table', 'block', 'row'])) {
            throw new InvalidArgumentException("Repeater field's layout attribute must be either 'table', 'block' or 'row'. {$layout} given.");
        }

        $this->layout = $layout;

        return $this;
    }

    /**
     * Add repeater field's child field.
     * 
     * @param  \Tenbajt\Models\ACF\Field  $field
     * @return \Tenbajt\Models\ACF\Fields\RepeaterField
     */
    public function addField(Field $field): RepeaterField
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Set repeater field's button label.
     * 
     * @param  string  $label
     * @return \Tenbajt\Models\ACF\Fields\RepeaterField
     */
    public function setButtonLabel(string $label): RepeaterField
    {
        $this->buttonLabel = $label;

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
        $parent = parent::build($parent);

        foreach ($this->fields as &$field) {
            $field = $field->build($this);
        }

        return array_merge($parent, [
            'min' => $this->min,
            'max' => $this->max,
            'layout' => $this->layout,
            'collapsed' => $this->fields[0]['key'],
            'sub_fields' => $this->fields,
            'button_label' => $this->buttonLabel,
        ]);
    }
}