<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransRequest;
use App\Http\Requests\BorrowBookRequest;
use App\Repository\Contracts\TransRepositoryInterface;
use App\Repository\Contracts\BookStorageRepositoryInterface;

class TransController extends BaseApiController
{
    protected TransRepositoryInterface $trans_repository;
    protected BookStorageRepositoryInterface $bookstorage_repository;

    public function __construct(
        TransRepositoryInterface $trans_repository,
        BookStorageRepositoryInterface $bookstorage_repository
    )
    {
        $this->trans_repository = $trans_repository;
        $this->bookstorage_repository = $bookstorage_repository;
    }

    public function getByUser(TransRequest $request)
    {
        $trans = $this->trans_repository->getByUser($request->user()->id, $request);
        return $this->responseWithData('success', $trans);
    }

    public function rentBook(BorrowBookRequest $request)
    {
        if ($this->bookstorage_repository
            ->validateAndUpdateQuantity($request->getQuantity(), $request->getBookID()))
        {
            $trans = $this->trans_repository->rentByUser($request->user()->id, $request);
            return $this->responseWithData('success', $trans);
        }
        return $this->responseWithError('bad request', [], 400);
    }
}