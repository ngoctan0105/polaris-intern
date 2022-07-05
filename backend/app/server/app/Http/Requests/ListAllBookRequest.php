<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Partials\RequestParameterResolvingTrait;

class ListAllBookRequest extends BaseRequest
{
    use RequestParameterResolvingTrait;
  
    /** @parameter */
    private ?int $limit;

    /** @parameter */
    private ?int $offset;

    /**
     * @parameter
     */
    private ?int $year;

    /**
     * @parameter
     */
    private ?string $publisher;

    /**
     * @parameter
     */
    private ?string $author;

    /**
     * @parameter
     */
    private ?string $name;

    /**
     * @parameter
     */
    private ?bool $available;

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
        return true;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function getPublisher(): ?string
    {
         return $this->publisher;
    }   

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAvai(): ?bool
    {
        return $this->available;
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
}
