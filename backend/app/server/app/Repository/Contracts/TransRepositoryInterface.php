<?php

namespace App\Repository\Contracts;

use App\Http\Requests\TransRequest;
use App\Http\Requests\BorrowBookRequest;
use App\Models\ModelTransaction;

/**
 * Class TransRepositoryInterface
 *
 * @package App\Repository\Contracts
 *
 */
interface TransRepositoryInterface
{
    /**
    * @return ModelTransaction[]
    */
    public function getByUser(string $user_id, TransRequest $req);
    public function rentByUser(string $user_id, BorrowBookRequest $req);
}
