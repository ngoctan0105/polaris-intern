<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;

class BookRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;

    /**
     * @var string
     */
    private string $book_id;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    public function authorize()
    {
        $this->book_id = $this->route('book_id');
        return true;
    }

    /**
     * @return string
     */
    public function getBookId(): string
    {
        return $this->book_id;
    }
}
