<?php

namespace App\Models;

use App\Traits\HasBookRelation;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelTransaction
 *
 * @package App\Models
 *
 * @property string              $book_id
 * @property int              $quantity
*/
class ModelBookStorage extends Model
{
    use HasFactory, TraitUuid, HasBookRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const TABLE = 'book_storage';
    protected $table = self::TABLE;

    const COL_BOOK_ID = "book_id";
    const COL_QUANTITY = "quantity";

    protected $fillable = [
        self::COL_BOOK_ID, self::COL_QUANTITY
    ];

    protected $with = ['book'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    public $timestamps = false;
}
