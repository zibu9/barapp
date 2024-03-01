<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'address' => $input['address'],
            'city' => $input['city'],
            'role_id' => 4,
            'password' => Hash::make($input['password']),
        ]);

        //$user->sendEmailVerificationNotification();
        return $user;
    }
}
