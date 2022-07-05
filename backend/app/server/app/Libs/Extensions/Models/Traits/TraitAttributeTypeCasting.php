<?php

namespace Libs\Extensions\Models\Traits;


trait TraitAttributeTypeCasting
{
    //  mongo comparision is type-strict, so make sure we do not save string value into a number field ('1' is not 1).
    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    // ];
    /**
     * Apply casting on the attribute before saving
     *
     * @var string $key
     * @var mixed  $value
     */
    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, $this->casts)
            && !in_array($this->casts[$key], ['object', 'json', 'array', 'collection', 'date', 'datetime', 'custom_datetime', 'timestamp'])) {
            parent::setAttribute($key, self::castAttribute($key, $value));
        } else {
            parent::setAttribute($key, $value);
        }
    }
}