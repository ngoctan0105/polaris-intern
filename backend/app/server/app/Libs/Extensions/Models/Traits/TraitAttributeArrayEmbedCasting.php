<?php

namespace Libs\Extensions\Models\Traits;


use AppFramework\Exceptions\InvalidValueException;

trait TraitAttributeArrayEmbedCasting
{
    /**
     * Get the embedded array-casts array
     *
     * @return array
     */
    public function getEmbeddedArrayCasts()
    {
        return $this->embedded_array_casts;
    }

    public function handleCastEmbeddedArrayAttribute($key, $value)
    {
        if (is_array($value)) {
            if (array_key_exists($key, $this->getEmbeddedArrayCasts())) {
                $target_class = $this->getEmbeddedArrayCasts()[$key];
                foreach ($value as $k => &$v) {
                    if (!($v instanceof $target_class)) {
                        if (method_exists($target_class, 'fromNative')) {
                            $v = $target_class::fromNative($v);
                        } else {
                            if (is_string($v)) {
                                $v = json_decode($v, true);
                            }
                            if (is_null($v)) {
                                throw new InvalidValueException();
                            }
                            $v = new $target_class($v);
                        }
                    }
                }
                unset($v);
                return $value;
            }
        }
        return $value;
    }

    public function handleEmbeddedArrayAttributesToArray($attributes)
    {
        foreach ($this->getEmbeddedArrayCasts() as $name => $target_class) {
            if (array_has($attributes, $name)
                && is_array($attributes[$name])
            ) {
                foreach ($attributes[$name] as $k => &$v) {
                    if ($v instanceof $target_class && method_exists($v, 'toArray')) {
                        $v = $v->toArray();
                    }
                }
                unset($v);
            }
        }
        return $attributes;
    }
}