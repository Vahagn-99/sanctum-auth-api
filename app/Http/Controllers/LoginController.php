<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        Fortify::authenticateUsing(function (UserLoginRequest $request) {
            // get only validated data
            $fields = $request->validate();
            // get a user by email or if given data wrong abort the process
            $user = User::where('email', $fields['email'])->firstOrFail();

            //check user and user input password
            if (
                $user &&
                $this->checkPassword($fields['password'], $user->password)
            ) {
                return $user;
            }
        });
    }

    public function logout()
    {
        // get auth user
        auth()
            ->user()
            //delete all the tokens
            ->tokens()
            ->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
