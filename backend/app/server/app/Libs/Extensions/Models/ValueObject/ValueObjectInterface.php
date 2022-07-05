<?php

namespace Libs\Extensions\Models\ValueObject;


interface ValueObjectInterface
{
    /**
     * Named constructor to make a Value Object from a native value.
     *
     * @param string|null $value
     *
     * @return mixed
     */
    public static function fromNative($value);

    /**
     * Returns the native value of this Value Object.
     *
     * @return mixed
     */
    public function toNative();

    /**
     * Returns the string representation of this Value Object.
     *
     * @return string
     */
    public function __toString();

}