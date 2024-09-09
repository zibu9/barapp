<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminService extends Service
{
    public function createProduct(array $data)
    {
        return 0;
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
