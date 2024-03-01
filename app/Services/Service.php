<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

abstract class Service
{

    public function getUserRole()
    {
        if (Auth::check()) {
            return Auth::user()->role->id;
        }
        return null;
    }
}
