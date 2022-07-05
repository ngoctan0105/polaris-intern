<?php


namespace App\Http\Requests\Partials;


trait RequestPaginationParameterTrait
{
    /**
     * @parameter
     * @OA\Property(description="filter per page")
     *
     * @var integer
     */
    private $per_page;

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->per_page ?: 15;
    }
}