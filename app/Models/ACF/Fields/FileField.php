<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class FileField extends Field
{
    /**
     * The file field's name for saving and retriving data.
     * 
     * @var string
     */
    protected $name = 'file';

    /**
     * The file field's type.
     * 
     * @var string
     */
    protected $type = 'file';

    /**
     * The file field's label.
     * 
     * @var string
     */
    protected $label = 'Plik';

    /**
     * The file field's library to choose from. Either 'all' or 'uploadedTo' (post being edited).
     * 
     * @var string
     */
    protected $library = 'all';

    /**
     * The file field's allowed extensions when uploading.
     * 
     * @var array
     */
    protected $extensions = ['pdf'];

    /**
     * The file field's preview size on edit screen.
     * 
     * @var string
     */
    protected $previewSize = 'thumbnail';

    /**
     * The file field's return format. Either 'id', 'url' or 'array'.
     * 
     * @var string
     */
    protected $returnFormat = 'array';

    /**
     * The file field's minimum file size. Can have unit included, ex: '256KB'.
     * 
     * @var mixed
     */
    protected $minSize = 0;

    /**
     * The file field's maximum file size. Can have unit included, ex: '256KB'.
     * 
     * @var mixed
     */
    protected $maxSize = 0;

    /**
     * Build an array in ACF format from the field instance.
     * 
     * @param  \Tenbajt\Models\ACF\Metabox|\Tenbajt\Models\ACF\Field  $parent
     * @return array
     */
    public function build(object $parent): array
    {
        $this->extensions = implode(',', $this->extensions);

        return array_merge(parent::build($parent), [
            'library' => $this->library,
            'min_size' => $this->minSize,
            'max_size' => $this->maxSize,
            'mime_types' => $this->extensions,
            'preview_size' => $this->previewSize,
            'return_format' => $this->returnFormat,
        ]);
    }
}