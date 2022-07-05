<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\ListAllBookRequest;
use App\Repository\Contracts\BookRepositoryInterface;

class BookController extends BaseApiController
{
    protected BookRepositoryInterface $book_repository;
    
    public function __construct(BookRepositoryInterface $book_repository)
    {
        $this->book_repository = $book_repository;
    }

    public function getByID(BookRequest $request)
    {
        $book = $this->book_repository->getByID($request->getBookId());
        return $this->responseWithData('success', $book);
    }

    /**
     * search function with filter like author, publisher, year, availability, etc
     */
    public function list(ListAllBookRequest $request)
    {
        $books = $this->book_repository->getAll($request);
        return $this->responseWithData('success', $books);
    }
}