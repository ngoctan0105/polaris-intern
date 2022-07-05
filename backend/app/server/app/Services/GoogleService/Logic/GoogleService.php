<?php

namespace App\Services\GoogleService\Logic;

use App\Exceptions\BaseUnauthorizedException;
use App\Models\ModelUser;
use Google\Client;


class GoogleService 
{
    public function getAccessToken(string $code, string $redirect_uri)
    {
        $client = new Client();
        $client->setAuthConfig([
            'client_id' => env('GOOGLE_CLIENT_ID', ''),
            'client_secret' => env('GOOGLE_CLIENT_SECRET', '')
        ]);
        $client->addScope([
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email'
        ]);
        $client->setRedirectUri($redirect_uri);
        try {
            $client->fetchAccessTokenWithAuthCode($code);
            if (!$client->verifyIdToken()) {
                throw new BaseUnauthorizedException('user unauthorized');
            }

        } catch (\Exception $e) {
            throw new BaseUnauthorizedException('user unauthorized');
        }
        return [
            ModelUser::COL_EMAIL => $client->verifyIdToken()['email'],
            ModelUser::COL_NAME => $client->verifyIdToken()['name'],
            ModelUser::COL_AVATAR => $client->verifyIdToken()['picture'],
            ModelUser::COL_TYPE => 'member',
        ] ;
    }
}