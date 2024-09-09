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

    public function toggleBlockUser(User $user)
    {
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
    }

    public function resetPassword(User $user)
    {
        $newPassword = '12345678';
        $user->password = Hash::make($newPassword);
        $user->save();
    }

    public function updateUser(User $user, array $data)
    {
        $user->update($data);
    }
}
