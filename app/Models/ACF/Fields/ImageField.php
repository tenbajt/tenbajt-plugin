<?php

namespace Tenbajt\Models\ACF\Fields;

use Tenbajt\Models\ACF\Field;

class ImageField extends Field
{
    /**
     * The image field's name for saving and retriving data.
     * 
     * @var string
     */
    protected $name = 'image';

    /**
     * The image field's type.
     * 
     * @var string
     */
    protected $type = 'image';

    /**
     * The image field's label.
     * 
     * @var string
     */
    protected $label = 'Zdjęcie';

    /**
     * The image field's library to choose from. Either 'all' or 'uploadedTo' (post being edited).
     * 
     * @var string
     */
    protected $library = 'all';

    /**
     * The image field's allowed extensions when uploading.
     * 
     * @var array
     */
    protected $extensions = ['jpg', 'jpeg', 'png', 'svg'];

    /**
     * The image field's preview size on edit screen.
     * 
     * @var string
     */
    protected $previewSize = 'thumbnail';

    /**
     * The image field's return format. Either 'id', 'url' or 'array'.
     * 
     * @var string
     */
    protected $returnFormat = 'array';

    /**
     * The image field's minimum file size. Can have unit included, ex: '256KB'.
     * 
     * @var mixed
     */
    protected $minSize = 0;

    /**
     * The image field's maximum file size. Can have unit included, ex: '256KB'.
     * 
     * @var mixed
     */
    protected $maxSize = 0;

    /**
     * The image field's minimum width in pixels.
     * 
     * @var int
     */
    protected $minWidth = 0;

    /**
     * The image field's maximum width in pixels.
     * 
     * @var int
     */
    protected $maxWidth = 0;

    /**
     * The image field's minimum height in pixels.
     * 
     * @var int
     */
    protected $minHeight = 0;

    /**
     * The image field's maximum height in pixels.
     * 
     * @var int
     */
    protected $maxHeight = 0;

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
            'min_width' => $this->minWidth,
            'max_width' => $this->maxWidth,
            'min_height' => $this->minHeight,
            'max_height' => $this->maxHeight,
            'mime_types' => $this->extensions,
            'preview_size' => $this->previewSize,
            'return_format' => $this->returnFormat,
        ]);
    }
}