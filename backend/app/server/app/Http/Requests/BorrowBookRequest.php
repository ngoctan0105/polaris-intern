<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;

class BorrowBookRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;

    /** @parameter */
    private string $book_id;

    /** @parameter */
    private int $quantity;

    /** @parameter */
    private string $end_date;

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
            'book_id'  => 'required|string',
            'quantity' => 'required|int',
            'end_date' => 'required|string'
        ];
    }

    /**
     * @return string
     */
    public function getBookID(): string
    {
        return $this->book_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }
}
