<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\ModelUser;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Services\GoogleService\Logic\GoogleService;
use Illuminate\Http\Request;

class AuthController extends BaseApiController
{
    private GoogleService $googleService;
    private UserRepositoryInterface $user_repository;

    // private ProfileLogic $profile_logic;

    public function __construct(GoogleService $googleService, UserRepositoryInterface $user_repository)
    {
        $this->googleService = $googleService;
        $this->user_repository = $user_repository;
        // $this->profile_logic   = $profile_logic;
    }


    public function login(LoginRequest $request)
    {
        $rawUser = $this->googleService->getAccessToken($request->getCode(), $request->getRedirectUri());

        $user = $this->user_repository->createUser(
            $rawUser[ModelUser::COL_NAME],
            $rawUser[ModelUser::COL_EMAIL],
            $rawUser[ModelUser::COL_AVATAR],
            $rawUser[ModelUser::COL_TYPE],
        );

        $personal_access_token = $user->createToken('Personal Access Token');

        return $this->responseWithData('success', [
            'access_token' => $personal_access_token->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        /**
         * @var ModelUser $user
         */
        $user = $request->user();
        $user->tokens()->delete();

        return $this->responseWithData('success');
    }
}
