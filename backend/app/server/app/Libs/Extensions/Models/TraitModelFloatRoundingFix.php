<?php

namespace Libs\Extensions\Models;


trait TraitModelFloatRoundingFix
{
    public function setRawAttributes(array $attributes, $sync = false)
    {
        if (property_exists($this, 'floats')) {
            foreach ($this->floats as $floatField) {
                if (array_key_exists($floatField, $attributes)) {
                    $attributes[$floatField] = round($attributes[$floatField], 10);
                }
            }
        }
        parent::setRawAttributes($attributes, $sync);
    }
}
