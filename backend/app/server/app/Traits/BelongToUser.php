<?php


namespace App\Traits;

use App\Models\ModelUser;

/**
 * Trait BelongToUser
 *
 * @package App\Traits
 * @property-read ModelUser $user
 */
trait BelongToUser
{
    public function user()
    {
        return $this->belongsTo(ModelUser::class, self::COL_USER_ID, ModelUser::COL_ID);
    }
}