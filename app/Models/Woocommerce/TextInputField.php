<?php

namespace Tenbajt\Models\Woocommerce;

use Tenbajt\Models\Model;

class TextInputField extends Model
{
    /**
     * The field's id.
     * 
     * @var string
     */
    protected $id;

    /**
     * The field's name. An id is used when not set.
     * 
     * @var string
     */
    protected $name = '';

    /**
     * The field's type.
     * 
     * @var string
     */
    protected $type = 'text';

    /**
     * The field's label.
     * 
     * @var string
     */
    protected $label = 'Tekst';

    /**
     * The field's data type. Either 'url', 'stock', 'price', 'decimal' or empty.
     * 
     * @var string
     */
    protected $dataType;

    /**
     * The field's placeholder.
     * 
     * @var string
     */
    protected $placeholder = '';

    /**
     * The field's description.
     * 
     * @var string
     */
    protected $description = '';

    /**
     * Whether to show description in a tip.
     * 
     * @var bool
     */
    protected $descriptionTip = false;

    /**
     * Create a new field instance.
     * 
     * @param  string  $id
     * @return void
     */
    public function __construct(string $id, string $dataType = '')
    {
        $this->id = $id;
        $this->name = $id;
        $this->dataType = $dataType;
    }

    /**
     * Set field's label.
     * 
     * @param  string  $label
     * @return \Tenbajt\Models\WooCommerce\Fields\TextInputField
     */
    public function setLabel(string $label): TextInputField
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Return field's id.
     * 
     * @return string  $id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Render the field.
     * 
     * @return void
     */
    public function render(): void
    {
        woocommerce_wp_text_input([
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'label' => $this->label,
            'data_type' => $this->dataType,
            'placeholder' => $this->placeholder,
            'description' => $this->description,
            'descriptionTip' => $this->descriptionTip,
        ]);
    }
}