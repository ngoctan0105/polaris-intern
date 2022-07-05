<?php

namespace App\Repository\DefaultImplement;

use App\Models\ModelUser;
use App\Repository\Contracts\UserRepositoryInterface;

/**
 * Class UserRepository
 *
 * @package App\Repository\DefaultImplement
 *
 */
class UserRepository implements UserRepositoryInterface
{

    public function createUser(string $name, string $email, ?string $avatar = null, ?string $type = 'member'): ?ModelUser
    {
        $user = $this->findByEmail($email);

        if ($user) {
            return $user;
        }
        
        $user = ModelUser::query()->create([
            ModelUser::COL_EMAIL  => $email,
            ModelUser::COL_NAME   => $name,
            ModelUser::COL_AVATAR => $avatar,
            ModelUser::COL_TYPE   => $type,
        ]);

        return $user;
    }


    public function findByEmail(string $email): ?ModelUser
    {
        return ModelUser::where(ModelUser::COL_EMAIL, $email)->first();
    }


    public function updateUser(ModelUser $user): ModelUser
    {
        ModelUser::where(ModelUser::COL_ID, $user->id)->update([
                    ModelUser::COL_NAME => $user->name, 
                    ModelUser::COL_AVATAR => $user->avatar
                ]);
        return $user;
    }
}
