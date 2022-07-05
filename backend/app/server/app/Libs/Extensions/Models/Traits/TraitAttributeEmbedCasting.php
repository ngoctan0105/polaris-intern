<?php

namespace Libs\Extensions\Models\Traits;


trait TraitAttributeEmbedCasting
{
    /**
     * Get the embedded casts array
     *
     * @return array
     */
    public function getEmbeddedCasts()
    {
        return $this->embedded_casts;
    }

    public function handleCastEmbeddedAttribute($key, $value)
    {
        if (is_null($value)) return $value;

        if (array_key_exists($key, $this->getEmbeddedCasts())) {

            $target_class = $this->getEmbeddedCasts()[$key];
            if ($value instanceof $target_class)
                return $value;
            else {
                if (is_string($value)) {
                    $value = json_decode($value, true);
                }

                if (method_exists($target_class, 'fromNative')) {
                    return $target_class::fromNative($value);
                }

                if (is_null($value)) {
                    return null;
                }
                return new $target_class($value);
            }
        }
        return $value;
    }

    public function handleEmbeddedAttributeToArray($attributes)
    {
        foreach ($this->getEmbeddedCasts() as $name => $target_class) {
            if (array_has($attributes, $name)
                && !is_null($attributes[$name])
                && $attributes[$name] instanceof $target_class
                && method_exists($attributes[$name], 'toArray')
            ) {
                $attributes[$name] = $attributes[$name]->toArray();
            }
        }
        return $attributes;
    }
}