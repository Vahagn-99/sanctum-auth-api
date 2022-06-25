<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        // get onlly validated data form request
        $fields = $request->validated();
        // create new user
        $user = (new CreateNewUser())->create($fields);
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
}
