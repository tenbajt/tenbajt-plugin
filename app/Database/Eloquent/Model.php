<?php

namespace Tenbajt\Database\Eloquent;

use Illuminate\Database\Eloquent\Model as Base;
use Illuminate\Support\Facades\Validator;

class Model extends Base
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * The model attribute's validation rules.
     * 
     * @var array
     */
    protected $rules = [];

    /**
     * The model attribute's validation messages.
     * 
     * @var array
     */
    protected $messages = [
        'required' => 'The :attribute field is required.',
    ];

    /**
     * Validate model's attributes.
     * 
     * @return \Illuminate\Validation\Validator
     */
    public function validate()
    {
        return Validator::make($this->getAttributes(), $this->rules, $this->messages);
    }

    /**
     * Create and return an un-saved model instance.
     *
     * @param  array  $attributes
     * @return \Tenbajt\Database\Eloquent\Model
     */
    public static function make(array $attributes = []): Model
    {
        return new static($attributes);
    }
}