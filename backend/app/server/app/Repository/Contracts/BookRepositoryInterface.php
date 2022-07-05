<?php

namespace App\Repository\Contracts;

use App\Models\ModelBook;
use App\Http\Requests\ListAllBookRequest;

/**
 * Class BookRepositoryInterface
 *
 * @package App\Repository\Contracts
 *
 */
interface BookRepositoryInterface
{
    public function getByID(string $id): ?ModelBook;
    public function getAll(ListAllBookRequest $req);
}
