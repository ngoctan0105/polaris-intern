<?php

namespace Libs\Extensions\Models\Traits;


use Libs\Extensions\Models\ValueObject\ValueObjectInterface;
use Illuminate\Contracts\Support\Arrayable;

trait TraitApplyCasting
{
    /**
     *
     */
    public static function bootTraitApplyCasting()
    {
        static::saved(function ($model) {
            if (method_exists($model, 'getEmbeddedCasts')) {
                foreach ($model->getEmbeddedCasts() as $key => $class) {
                    if (isset($model[$key]) && is_object($model[$key]) && method_exists($model[$key], 'onModelSaved')) {
                        $model[$key]->onModelSaved();
                    }
                }
            }
            if (method_exists($model, 'getEmbeddedArrayCasts')) {
                foreach ($model->getEmbeddedArrayCasts() as $key => $class) {
                    if (isset($model[$key]) && is_array($model[$key])) {
                        foreach (@$model[$key] as &$item) {
                            if (is_object($item) && method_exists($item, 'onModelSaved')) {
                                $item->onModelSaved();
                            }
                        }
                        unset($item);
                    }
                }
            }
        });
    }

    /**
     * Get the casts array.
     *
     * @see \Illuminate\Database\Eloquent\Concerns\HashAttributes::getCasts()
     *
     * @return array
     */
    public function getCasts()
    {
        return (method_exists($this, 'getEmbeddedCasts') ? $this->getEmbeddedCasts() : [])
            + (method_exists($this, 'getEmbeddedArrayCasts') ? $this->getEmbeddedArrayCasts() : [])
            + parent::getCasts();
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @see \Illuminate\Database\Eloquent\Concerns\HashAttributes::castAttribute($key, $value)
     *
     * @param  string $key
     * @param  mixed  $value
     *
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        if (method_exists($this, 'handleCastEmbeddedAttribute')) {
            $value = $this->handleCastEmbeddedAttribute($key, $value);
        }
        if (method_exists($this, 'handleCastEmbeddedArrayAttribute')) {
            $value = $this->handleCastEmbeddedArrayAttribute($key, $value);
        }
        return parent::castAttribute($key, $value);
    }

    /**
     * Convert the model's attributes to an array.
     *
     * @see \Illuminate\Database\Eloquent\Concerns\HashAttributes::attributesToArray()
     *
     * @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();
        if (method_exists($this, 'handleEmbeddedArrayAttributesToArray')) {
            $attributes = $this->handleEmbeddedArrayAttributesToArray($attributes);
        }
        if (method_exists($this, 'handleEmbeddedAttributeToArray')) {
            $attributes = $this->handleEmbeddedAttributeToArray($attributes);
        }
        return $attributes;
    }

    /**
     * Determine if the new and old values for a given key are equivalent.
     *
     * @see \Illuminate\Database\Eloquent\Concerns\HashAttributes::originalIsEquivalent($key, $current)
     *
     * @param  string $key
     * @param  mixed  $current
     *
     * @return bool
     */
    protected function originalIsEquivalent($key, $current)
    {
        if (!array_key_exists($key, $this->original)) {
            return false;
        }

        $original = $this->getOriginal($key);

        if ($current === $original) {
            return true;
        } elseif (is_null($current)) {
            return false;
        } elseif ($this->isDateAttribute($key)) {
            return $this->fromDateTime($current) === $this->fromDateTime($original);
        } elseif ($this->hasCast($key)) {
            if ($current === $original) {
                if (is_array($current)) {
                    foreach ($current as $v) {
                        if (method_exists($v, 'isChanged') && $v->isChanged())
                            return false;
                    }
                }

                return !method_exists($current, 'isChanged') || !$current->isChanged();
            }

            $current_value = $this->_trait_apply_casting_castToNativeValue($this->castAttribute($key, $current));
            $old_value     = $this->_trait_apply_casting_castToNativeValue($this->castAttribute($key, $original));

            return $current_value === $old_value;
        }

        return is_numeric($current) && is_numeric($original)
            && strcmp((string)$current, (string)$original) === 0;
    }

    private function _trait_apply_casting_castToNativeValue($value)
    {
        if ($value instanceof ValueObjectInterface) {
            return $value->toNative();
        } elseif ($value instanceof Arrayable) {
            return $value->toArray();
        }
        return $value;
    }
}