<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;

class UserRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;

    /** @parameter */
    private ?string $name;

    /** @parameter */
    private ?string $avatar;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'nullable|string',
            'avatar' => 'nullable|string'
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name? : '';
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar? : '';
    }
}
