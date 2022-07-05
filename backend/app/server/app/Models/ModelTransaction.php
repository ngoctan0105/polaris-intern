<?php

namespace App\Models;

use App\Traits\BelongToUser;
use App\Traits\HasBookRelation;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelTransaction
 *
 * @package App\Models
 *
 * @property string              $id
 * @property string              $user_id
 * @property string              $book_id
 * @property int                 $quantity
 * @property int                 $fee
 * @property string              $status
 * @property \Carbon\Carbon|null $end_date
 * @property \Carbon\Carbon|null $return_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class ModelTransaction extends Model
{
    use HasFactory, TraitUuid, BelongToUser, HasBookRelation;

    const TABLE = 'transactions';
    protected $table = self::TABLE;

    const COL_ID          = "id";
    const COL_USER_ID     = "user_id";
    const COL_BOOK_ID     = "book_id";
    const COL_QUANTITY    = "quantity";
    const COL_FEE         = "fee";
    const COL_END_DATE    = "end_date";
    const COL_RETURN_DATE = "return_date";
    const COL_CREATED_AT  = "created_at";
    const COL_UPDATED_AT  = "updated_at";

    protected $fillable = [
        self::COL_USER_ID, self::COL_BOOK_ID,
        self::COL_QUANTITY, self::COL_FEE,
        self::COL_END_DATE, self::COL_RETURN_DATE
    ];

    protected $with = ['book'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::COL_USER_ID, self::COL_BOOK_ID, self::COL_UPDATED_AT
    ];
}
