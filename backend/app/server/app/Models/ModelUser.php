<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class ModelUser
 *
 * @package App\Models
 *
 * @property string              $id
 * @property string              $name
 * @property string              $email
 * @property string              $avatar
 * @property string              $type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class ModelUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TraitUuid;

    const TABLE = 'users';
    protected $table = 'users';

    const COL_ID          = "id";
    const COL_NAME        = "name";
    const COL_EMAIL       = "email";
    const COL_AVATAR      = "avatar";
    const COL_TYPE        = "type";
    const COL_CREATED_AT  = "created_at";
    const COL_UPDATED_AT  = "updated_at";
    
    protected $fillable = [
        self::COL_NAME, self::COL_EMAIL, self::COL_AVATAR, self::COL_TYPE
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::COL_CREATED_AT, self::COL_UPDATED_AT
    ];
}
