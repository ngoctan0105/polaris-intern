<?php

namespace App\Http\Controllers;


use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Libs\Extensions\Models\EloquentModel;
use Libs\Http\Response\KResponseCode;

class BaseApiController extends BaseController
{
    protected function responseWithData($message, $model = [], $status = 200)
    {
        $response = [
            'message' => $message,
            'success' => true,
        ];

        if ($model instanceof EloquentModel
            || $model instanceof Collection
            || ((is_array($model) || $model instanceof Countable))
            || $model instanceof Arrayable
        ) {
            $response['data'] = $model;
        }

        return new JsonResponse($response, $status);
    }

    protected function responseWithError($message, $errors = [], $status = KResponseCode::HTTP_BAD_REQUEST)
    {
        return new JsonResponse(['message' => $message, 'success' => false, 'errors' => $errors], $status);
    }

}
