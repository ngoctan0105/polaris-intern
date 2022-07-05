<?php

namespace Libs\Extensions\Presenter\Exceptions;


class PresenterJsonEncodingException extends \RuntimeException
{
    /**
     * Create a new JSON encoding exception for the model.
     *
     * @param  mixed  $presenter
     * @param  string $message
     *
     * @return static
     */
    public static function forPresenter($presenter, $message)
    {
        return new static('Error encoding model [' . get_class($presenter) . '] with ID [' . $presenter->getKey() . '] to JSON: ' . $message);
    }

    /**
     * Create a new JSON encoding exception for an attribute.
     *
     * @param  mixed  $presenter
     * @param  mixed  $key
     * @param  string $message
     *
     * @return static
     */
    public static function forAttribute($presenter, $key, $message)
    {
        $class = get_class($presenter);

        return new static("Unable to encode attribute [{$key}] for model [{$class}] to JSON: {$message}.");
    }
}