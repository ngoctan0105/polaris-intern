<?php

namespace App\Repository\DefaultImplement;

use App\Consts\TransactionType;
use App\Http\Requests\TransRequest;
use App\Http\Requests\BorrowBookRequest;
use App\Models\ModelBook;
use App\Models\ModelTransaction;
use App\Repository\Contracts\TransRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class TransRepository
 *
 * @package App\Repository\DefaultImplement
 *
 */
class TransRepository implements TransRepositoryInterface
{
    /**
     * @return ModelTransaction[]
     */
    public function getByUser(string $user_id, TransRequest $req)
    {
        $query = ModelTransaction::query()
            ->limit($req->getLimit())
            ->offset($req->getOffset())
            ->select('transactions.*', DB::raw('IF(transactions.' . ModelTransaction::COL_RETURN_DATE . ' IS NOT NULL, "' . TransactionType::RETURNED . '", IF(transactions.' . ModelTransaction::COL_END_DATE . ' > NOW(), "' . TransactionType::BORROWING . '", "' . TransactionType::OVERDUE . '")) AS status'))
            ->where(ModelTransaction::COL_USER_ID, '=', $user_id);

        if ($req->getSearch() && !empty($req->getSearch())) {
            $query->join('books', function ($join) use ($req) {
                $join->on('transactions.' . ModelTransaction::COL_BOOK_ID, '=', 'books.' . ModelBook::COL_ID);
                $join->where('books.' . ModelBook::COL_NAME, '=', $req->getSearch());
            });
        }

        /**
         * @var ModelTransaction[] $trans
         */
        $trans = $query->orderBy('transactions.' . ModelTransaction::COL_CREATED_AT, 'desc')->get();

        return $trans;
    }

    public function rentByUser(string $user_id, BorrowBookRequest $req)
    {   
        $query = ModelTransaction::query()->create([
            ModelTransaction::COL_USER_ID => $user_id,
            ModelTransaction::COL_BOOK_ID => $req->getBookID(),
            ModelTransaction::COL_QUANTITY => $req->getQuantity(),
            ModelTransaction::COL_END_DATE => $req->getEndDate(),
            ModelTransaction::COL_FEE => 0
        ])
        ->join('books', 
                'transactions.'. ModelTransaction::COL_BOOK_ID, '=', 
                'books.'. ModelBook::COL_ID)
        ->select([
            'transactions.' . ModelTransaction::COL_ID,
            ModelTransaction::COL_BOOK_ID,
            'transactions.' . ModelTransaction::COL_CREATED_AT,
            ModelTransaction::COL_END_DATE,
            ModelTransaction::COL_QUANTITY,
            ModelTransaction::COL_FEE
        ])
        ->orderBy('transactions.' . ModelTransaction::COL_CREATED_AT, 'desc');
        
        /**
         * @var ModelTransaction $trans
         */
        $trans = $query->first();
        return $trans;
    }
}
