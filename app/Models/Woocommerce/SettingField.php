<?php

namespace Tenbajt\Models\Woocommerce;

use Tenbajt\Models\Model;

class SettingField extends Model
{
    /**
     * The setting field's ID.
     * 
     * @var string
     */
    protected $id;

    /**
     * The setting field's HTML type attribute.
     * 
     * @var string
     */
    protected $type = 'text';

    /**
     * The setting field's order.
     * 
     * @var int
     */
    protected $order = 0;

    /**
     * The setting field's label.
     * 
     * @var string
     */
    protected $label = '';

    /**
     * The setting field's HTML class attribute.
     * 
     * @var string
     */
    protected $class = '';

    /**
     * The setting field's HTML style attribute.
     * 
     * @var string
     */
    protected $style = '';

    /**
     * The setting field's current value.
     * 
     * @var mixed
     */
    protected $value = null;

    /**
     * The setting field's suffix (?).
     * 
     * @var string
     */
    protected $suffix = '';

    /**
     * The setting field's options. Used with type of 'select', 'multiselect', 'radio' and 'multi_select_countries'.
     * 
     * @var array
     */
    protected $options = [];

    /**
     * The setting field's tooltip content or whether to show description inside it.
     * 
     * @var string|bool
     */
    protected $tooltip = false;

    /**
     * The setting field's autoload attribute (?).
     * 
     * @var mixed
     */
    protected $autoload = null;

    /**
     * Whether The setting field's visibility depends on other field's state ('yes')
     * or its should show other fields when checked ('option').
     * 
     * @var string|bool
     */
    protected $showGroup = false;

    /**
     * Whether The setting field's visibility depends on other field's state ('yes')
     * or its should hide other fields when checked ('option').
     * 
     * @var string|bool
     */
    protected $hideGroup = false;

    /**
     * The setting field's custom HTML attributes.
     * 
     * @var array
     */
    protected $attributes = [];

    /**
     * The setting field's description.
     * 
     * @var string
     */
    protected $description = '';

    /**
     * The setting field's HTML placeholder attribute.
     * 
     * @var string
     */
    protected $placeholder = '';

    /**
     * The setting field's default value.
     * 
     * @var mixed
     */
    protected $defaultValue = '';

    /**
     * Whether the field is a 'start' or 'end' point of the checkbox group.
     * 
     * @var string|null
     */
    protected $checkboxGroup = null;

    /**
     * Create a new setting field instance.
     * 
     * @param  string  $id
     * @param  string  $type
     * @return void
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Set the setting field's HTML type attribute.
     * 
     * @param  string  $type
     * @return SettingField
     */
    public function setType(string $type): SettingField
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the setting field's order.
     * 
     * @param  int  $order
     * @return SettingField
     */
    public function setOrder(int $order): SettingField
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Set the setting field's label.
     * 
     * @param  string  $label
     * @return SettingField
     */
    public function setLabel(string $label): SettingField
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set the setting field's HTML class attribute.
     * 
     * @param  string  $class
     * @return SettingField
     */
    public function setClass(string $class): SettingField
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Set the setting field's HTML style attribute.
     * 
     * @param  string  $style
     * @return SettingField
     */
    public function setStyle(string $style): SettingField
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Set the setting field's current value.
     * 
     * @param  mixed  $value
     * @return SettingField
     */
    public function setValue($value): SettingField
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the setting field's suffix (?).
     * 
     * @param  string  $suffix
     * @return SettingField
     */
    public function setSuffix(string $suffix): SettingField
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Set the setting field's options. Used with type attribute of 'select', 'multiselect', 'radio' and 'multi_select_countries'.
     * 
     * @param  array  $options
     * @return SettingField
     */
    public function setOptions(array $options): SettingField
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Set the setting field's tooltip content or whether to show description inside it.
     * 
     * @param  string|bool  $tooltip
     * @return SettingField
     */
    public function setTooltip($tooltip): SettingField
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    /**
     * Set the setting field's autoload property (?).
     * 
     * @param  mixed  $autoload
     * @return SettingField
     */
    public function setAutoload($autoload): SettingField
    {
        $this->autoload = $autoload;

        return $this;
    }

    /**
     * Set whether the setting field's visibility depends on other field's state ('yes')
     * or its should show other fields when checked ('option').
     * 
     * @param  string  $setting
     * @return SettingField
     */
    public function setShowGroup(string $setting): SettingField
    {
        $this->showGroup = $setting;

        return $this;
    }

    /**
     * Set whether the setting field's visibility depends on other field's state ('yes')
     * or its should hide other fields when checked ('option').
     * 
     * @param  string  $setting
     * @return SettingField
     */
    public function setHideGroup(string $setting): SettingField
    {
        $this->hideGroup = $setting;

        return $this;
    }

    /**
     * Set the setting field's custom HTML attributes.
     * 
     * @param  array  $attributes
     * @return SettingField
     */
    public function setAttributes(array $attributes): SettingField
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Set the setting field's description.
     * 
     * @param  string  $description
     * @return SettingField
     */
    public function setDescription(string $description): SettingField
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the setting field's HTML placeholder attribute.
     * 
     * @param  string  $placeholder
     * @return SettingField
     */
    public function setPlaceholder(string $placeholder): SettingField
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Set the setting field's default value.
     * 
     * @param  mixed  $value
     * @return SettingField
     */
    public function setDefaultValue($value): SettingField
    {
        $this->defaultValue = $value;

        return $this;
    }

    /**
     * Set wheather this field is a 'start' or 'end' point of the checkbox group.
     * 
     * @param  string  $group
     * @return SettingField
     */
    public function setCheckboxGroup(string $group): SettingField
    {
        $this->checkboxGroup = $group;

        return $this;
    }

    /**
     * Return the setting field's ID.
     * 
     * @return string
     */
    public function getID(): string
    {
        return $this->id;
    }

    /**
     * Return the setting field's HTML type attribute.
     * 
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Return the setting field's order.
     * 
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * Return the setting field's label.
     * 
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Return the setting field's HTML class attribute.
     * 
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * Return the setting field's HTML style attribute.
     * 
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * Return the setting field's current value.
     * 
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Return the setting field's suffix (?).
     * 
     * @return string
     */
    public function getSuffix(): string
    {
        return $this->suffix;
    }

    /**
     * Return the setting field's options.
     * 
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Return the setting field's tooltip content or whether to show description inside it.
     * 
     * @return string|bool
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * Return the setting field's custom HTML attributes.
     * 
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Return the setting field's description.
     * 
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Return the setting field's HTML placeholder attribute.
     * 
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * Return the setting field's default value.
     * 
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Parse the setting field's property name to either WooCommerce's or our custom one.
     * 
     * @param  string  $name
     * @param  bool  $flip
     * @return string
     */
    protected function parsePropertyName(string $name, bool $flip = false): string
    {
        $bindings = [
            'css' => 'style',
            'desc' => 'description',
            'title' => 'label',
            'default' => 'defaultValue',
            'desc_tip' => 'tooltip',
            'checkboxgroup' => 'checkboxGroup',
            'show_if_checked' => 'showGroup',
            'hide_if_checked' => 'hideGroup',
            'custom_attributes' => 'attributes',
        ];

        // Flip indicates that it should return WooCommerce's property name instead.
        if ($flip) {
            $bindings = array_flip($bindings);
        }

        // Return the binding for the given name if it exists.
        if (array_key_exists($name, $bindings)) {
            return $bindings[$name];
        }

        // When the given name has no binding just return it.
        return $name;
    }

    /**
     * Convert the setting field instance to an array.
     * 
     * @return array
     */
    public function toArray(): array
    {
        foreach ($properties = get_object_vars($this) as $name => $value) {
            $properties[$this->parsePropertyName($name, true)] = $value;
        }

        return $properties;
    }

    /**
     * Dynamically set setting field's property.
     * 
     * @param  string  $name
     * @param  mixed  $value
     * @return mixed
     */
    public function __set(string $name, $value)
    {
        parent::__set($this->parsePropertyName($name), $value);
    }

    /**
     * Dynamically get setting field's property.
     * 
     * @param  string  $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return parent::__get($this->parsePropertyName($name));
    }

    /**
     * Save a new general setting field and return the instance.
     * 
     * @param  string  $id
     * @return GeneralSettingField
     */
    public static function create(string $id): SettingField
    {
        return tap(static::make($id), function ($field) {
            $field->save();
        });
    }
}