<?php

namespace Libs\Extensions\Models\Traits;


use Modules\Business\UserModule\Models\ModelUser;
use Illuminate\Database\Query\Builder;


/**
 * Class TraitModelUserScoping
 *
 * @package       App\Modules\Business\User\Traits
 *
 * @property-read  \Modules\Business\UserModule\Models\ModelUser user
 * @method static Builder ofUser(int | string | ModelUser $user)
 */
trait TraitModelUserScoping
{
    public static function userIdColumnName()
    {
        return 'user_id';
    }

    /**
     * Scope a query to only include products of a given user id
     *
     * @param Builder       $query
     * @param ModelUser|int $user
     *
     * @return Builder
     */
    public static function scopeOfUser($query, $user)
    {
        return $query->where(self::userIdColumnName(), is_object($user) ? $user->id : $user);
    }

    /**
     * Check if current entity is owned by specified user
     *
     * @param \Modules\Business\UserModule\Models\ModelUser|integer $user
     *
     * @return boolean true if owned
     */
    public function isOwnedByUser($user)
    {
        //FIXME: should this be strict comparing?
        return $this->{self::userIdColumnName()} == (is_object($user) ? $user->id : $user);
    }

    public function user()
    {
        return $this->belongsTo(ModelUser::class, self::userIdColumnName(), 'id');
    }
}