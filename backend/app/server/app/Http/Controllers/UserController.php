<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repository\Contracts\UserRepositoryInterface;

class UserController extends BaseApiController
{
    private UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function getProfile(Request $request)
    {
        return $this->responseWithData('success', $request->user());
    }

    public function updateProfile(UserRequest $request)
    {
        // Update name and avatar by origin if it is NULL
        $user = $request->user();
        $user->name = $request->getName()? $request->getName(): $user->name;
        $user->avatar = $request->getAvatar()? $request->getAvatar(): $user->avatar;
        $updateUser = $this->user_repository->updateUser($user);
        return $this->responseWithData('success', $updateUser);
    }
}
