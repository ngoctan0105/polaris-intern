<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;
use Illuminate\Validation\Rule;

class TransRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;

    /** @parameter */
    private ?int $limit;

    /** @parameter */
    private ?int $offset;

    /** @parameter */
    private ?string $search;

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
            'limit' => Rule::in([10, 25, 50, 100]),
        ];
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit ?: 10;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset ?: 0;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search ?: '';
    }
}
