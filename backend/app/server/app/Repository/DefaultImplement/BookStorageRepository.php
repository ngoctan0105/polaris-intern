<?php

namespace App\Repository\DefaultImplement;

use App\Repository\Contracts\BookStorageRepositoryInterface;
use App\Models\ModelBookStorage;

/**
 * Class BookStorageRepository
 *
 * @package App\Repository\DefaultImplement
 *
 */
class BookStorageRepository implements BookStorageRepositoryInterface
{
    public function findByID(string $book_id): ?ModelBookStorage
    {
        return ModelBookStorage::where(ModelBookStorage::COL_BOOK_ID, $book_id)->first();
    }

    public function validateAndUpdateQuantity(int $quantityNeed, string $book_id)
    {
        $bookStorageInfo = $this->findByID($book_id);
        if ($bookStorageInfo[ModelBookStorage::COL_QUANTITY] >= $quantityNeed)
        {
            ModelBookStorage::where(ModelBookStorage::COL_BOOK_ID, $book_id)
                    ->decrement(ModelBookStorage::COL_QUANTITY, $quantityNeed);
            return true;
        }
        return false;
    }
    
}   