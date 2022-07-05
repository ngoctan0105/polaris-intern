<?php

namespace App\Repository\DefaultImplement;

use App\Models\ModelBook;
use App\Repository\Contracts\BookRepositoryInterface;
use App\Http\Requests\ListAllBookRequest;
use App\Models\ModelBookStorage;

/**
 * Class UserRepository
 *
 * @package App\Repository\DefaultImplement
 *
 */
class BookRepository implements BookRepositoryInterface
{
    public function getByID(string $id): ?ModelBook
    {
        return ModelBook::where(ModelBook::COL_ID, $id)->first();
    }

    public function getAll(ListAllBookRequest $req) {

        $query = ModelBook::query()
             ->limit($req->getLimit())
             ->offset($req->getOffset());
        if ($req->getYear()) {
            $query->where('books.' . ModelBook::COL_YEAR, '=', $req->getYear());
        }

        if ($req->getPublisher()) {
            $query->where('books.' . ModelBook::COL_PUBLISHER, '=', $req->getPublisher());
        }

        if ($req->getAuthor()) 
        {
            $query->where('books.' . ModelBook::COL_AUTHOR, '=', $req->getAuthor());
        }
        
        if ($req->getName())
        {
            $query->where('books.' . ModelBook::COL_NAME, '=', $req->getName());
        }
        
        if ($req->getAvai()== true)
        {
            $query->join('book_storage', function ($join) use ($req) {
                $join->on('books.' . ModelBook::COL_ID, '=', 'book_storage.' . ModelBookStorage::COL_BOOK_ID);
                $join->where('book_storage.' . ModelBookStorage::COL_BOOK_ID, '>',0);
            });
        }       
        $books = $query->orderBy('books.' . ModelBook::COL_YEAR, 'desc')->get([ModelBook::COL_ID, ModelBook::COL_NAME, ModelBook::COL_COVER]);
        return $books;
    }   
    
}   