<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class GroupField extends Field
{
    /**
     * The group field's type.
     * 
     * @var string
     */
    protected $type = 'group';

    /**
     * The group field's layout. Either 'table', 'block' or 'row'.
     * 
     * @var string
     */
    protected $layout = 'row';

    /**
     * The group field's child fields.
     * 
     * @var array
     */
    protected $fields = [];

    /**
     * Set group field's layout.
     * 
     * @param  string  $layout
     * @return \Tenbajt\Models\ACF\Fields\GroupField
     * 
     * @throws \InvalidArgumentException
     */
    public function setLayout(string $layout): GroupField
    {
        if (! in_array($layout, ['table', 'block', 'row'])) {
            throw new InvalidArgumentException("Repeater field's layout attribute must be either 'table', 'block' or 'row'. {$layout} given.");
        }

        $this->layout = $layout;

        return $this;
    }

    /**
     * Add group field's child field.
     * 
     * @param  \Tenbajt\Models\ACF\Field  $field
     * @return \Tenbajt\Models\ACF\Fields\GroupField
     */
    public function addField(Field $field): GroupField
    {
        $this->fields[] = $field;

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
            'layout' => $this->layout,
            'sub_fields' => $this->fields,
        ]);
    }
}