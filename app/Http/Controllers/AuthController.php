<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        // get onlly validated data form request
        $fields = $request->validated();
        // convert password to hash
        $fields['password'] = $request->hashPassword();
        // create new user
        $user = User::create($fields);
        // create user token
        $token = $user->createUsertoken();
        // build response array
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        // return response and his status code
        return response($response, 201);
    }

    public function login(UserLoginRequest $request)
    {
        $fields = $request->validate();

        //check email
        $user = User::checkUserEmail($fields['email']);

        //check password
        if (!$user || !$user->checkUserPassword($fields['password'])) {
            return response(['message' => 'Bad creds'], 401);
        }

        $token = $user->createUsertoken();

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
