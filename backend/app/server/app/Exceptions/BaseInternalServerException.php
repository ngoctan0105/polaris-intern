<?php


namespace App\Exceptions;


use Throwable;

class BaseInternalServerException extends BaseException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
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
        $message = $this->message;
        if (!$message) {
            $message = __('api.error');
        };

        return response()->json([
            'success' => false,
            'message' => $message,
        ], 500);
    }
}
