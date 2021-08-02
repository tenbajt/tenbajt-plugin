<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class TaxonomyField extends Field
{
    /**
     * The field's type.
     * 
     * @var string
     */
    protected $type = 'taxonomy';

    /**
     * The field's style. Either 'radio', 'select', 'checkbox' or 'multi_select'.
     * 
     * @var string
     */
    protected $style = 'select';

    /**
     * The taxonomy key this field refers to.
     * 
     * @var string
     */
    protected $taxonomy;

    /**
     * Whether to allow saving term to post type object.
     * 
     * @var bool
     */
    protected $allowSave = true;

    /**
     * Whether to allow loading saved term from post type object.
     * 
     * @var bool
     */
    protected $allowLoad = true;

    /**
     * Whether this field can be set as empty.
     * 
     * @var bool
     */
    protected $allowEmpty = true;

    /**
     * Whether this field can create new taxonomy entries.
     * 
     * @var bool
     */
    protected $allowCreate = true;

    /**
     * The field's return format. Either 'object' or 'id'.
     * 
     * @var string
     */
    protected $returnFormat = 'id';

    /**
     * Set taxonomy key this field refers to.
     * 
     * @param  string  $taxonomy
     * @return \Tenbajt\Models\ACF\Fields\TaxonomyField
     */
    public function setTaxonomy(string $taxonomy): TaxonomyField
    {
        $this->taxonomy = $taxonomy;

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
        return array_merge(parent::build($parent), [
            'taxonomy' => $this->taxonomy,
            'add_term' => $this->allowCreate,
            'field_type' => $this->style,
            'save_terms' => $this->allowSave,
            'load_terms' => $this->allowLoad,
            'allow_null' => $this->allowEmpty,
            'return_format' => $this->returnFormat,
        ]);
    }
}