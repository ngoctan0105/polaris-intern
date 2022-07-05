<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;

class LoginRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;

    /**
     * @parameter
     */
    private string $code;

    /**
     * @parameter
     */
    private string $redirect_uri;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'         => 'required|string',
            'redirect_uri' => 'required|string',
        ];
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirect_uri;
    }
}
