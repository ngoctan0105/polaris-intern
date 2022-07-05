<?php

namespace App\Repository\Contracts;

use App\Models\ModelUser;

/**
 * Class UserRepositoryInterface
 *
 * @package App\Repository\Contracts
 *
 */
interface UserRepositoryInterface
{
    public function createUser(string $name, string $email, ?string $avatar = null, ?string $type = 'member'): ?ModelUser;
    public function findByEmail(string $email): ?ModelUser;
    public function updateUser(ModelUser $user): ModelUser;
}
