<?php


namespace App\Traits;

use App\Models\ModelBook;

/**
 * Trait HasBookRelation
 *
 * @package App\Traits
 * @property-read ModelBook $book
 */
trait HasBookRelation
{
    public function book()
    {
        return $this->belongsTo(ModelBook::class, self::COL_BOOK_ID, ModelBook::COL_ID);
    }
}