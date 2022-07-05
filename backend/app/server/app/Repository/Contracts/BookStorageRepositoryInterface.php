<?php

namespace App\Repository\Contracts;

use App\Models\ModelBookStorage;

/**
 * Class BookStorageRepositoryInterface
 *
 * @package App\Repository\Contracts
 *
 */
interface BookStorageRepositoryInterface
{
    public function findByID(string $book_id): ?ModelBookStorage;
    public function validateAndUpdateQuantity(int $quantityNeed, string $book_id);
}
