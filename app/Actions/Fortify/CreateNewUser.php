<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Traits\HashingPassword;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, HashingPassword;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $this->hashPassword($input['password']),
        ]);
    }
}
