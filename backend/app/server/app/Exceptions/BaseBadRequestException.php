<?php


namespace App\Exceptions;


use Throwable;

class BaseBadRequestException extends BaseException
{
    private array $errors;

    public function __construct($message = "", $errors = [], $code = 0, Throwable $previous = null)
    {
        $this->setErrors($errors);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        $errors  = $this->getErrors();
        $message = $this->message;
        if (!$message) {
            $message = @array_values($errors)[0][0] ?? __('api.bad_request');
        }

        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $this->getErrors(),
        ], 400);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     *
     * @return BaseUserInternalException
     */
    public function setErrors(array $errors): BaseBadRequestException
    {
        $this->errors = $errors;

        return $this;
    }
}
