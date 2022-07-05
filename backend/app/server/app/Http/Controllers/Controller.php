<?php

namespace App\Http\Controllers;

use App\DBChecker;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function config()
    {
        $data = [
            'message' => __('api.success'),
            'success' => true,
            'data' => [
                'webpush_public_key' => env('VAPID_PUBLIC_KEY'),
                'stripe_public_key' => config('billing_plan.stripe_key'),
            ],
        ];
        return new JsonResponse($data);
    }

    function healthz(DBChecker $checker)
    {
        if (!$checker->isDbReady()) {
            return "Fail";
        }

        return "OK";
    }
}
