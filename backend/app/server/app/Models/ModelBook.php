<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelBook
 *
 * @package App\Models
 *
 * @property string              $id
 * @property string              $isbn
 * @property string              $name
 * @property string              $author
 * @property string              $type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 */
class ModelBook extends Model
{
    use HasFactory, TraitUuid;

    const TABLE = 'books';
    protected $table = 'books';

    const COL_ID          = "id";
    const COL_ISBN        = "isbn";
    const COL_NAME        = "name";
    const COL_AUTHOR      = "author";
    const COL_PUBLISHER   = "publisher";
    const COL_COVER       = "cover";
    const COL_DESCRIPTION = "description";
    const COL_YEAR        = "year";
    const COL_CREATED_AT  = "created_at";
    const COL_UPDATED_AT  = "updated_at";
    const COL_DELETED_AT  = "deleted_at";
    
    protected $fillable = [
        self::COL_ISBN, self::COL_NAME, self::COL_AUTHOR, self::COL_PUBLISHER, self::COL_COVER, self::COL_DESCRIPTION, self::COL_YEAR
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::COL_CREATED_AT, self::COL_UPDATED_AT, self::COL_DELETED_AT
    ];
}
