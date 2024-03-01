<?php

namespace App\Services;

use App\Actions\Fortify\CreateNewUser;


class AuthService extends Service
{
    public function register(array $userData)
    {
        $createNewUser = new CreateNewUser();
        $user = $createNewUser->create($userData);
        return $user;
    }
}
