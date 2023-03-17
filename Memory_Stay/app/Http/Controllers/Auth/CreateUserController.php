<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;
// use App\Models\User;
// use Illuminate\Support\Str;
// use App\Http\Requests\UserCreateRequest;

// class CreateUserController extends Controller
// {
//     public function createUser(UserCreateRequest $request)
//     {
//         $request->validated();

//             $user = User::create([
//                 'uuid' => Str::uuid(),
//                 'name' => $request->name,
//                 'email' => $request->email,
//                 'password' => Hash::make($request->password)
//             ]);

//             return response()->json([
//                 'status' => true,
//                 'message' => 'User Created Successfully',
//                 'token' => $user->createToken("API TOKEN")->plainTextToken
//             ], 200);

//     }
// } 

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    

    /**
     * Handle account registration request
     * 
     * @param UserCreateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function createUser(UserCreateRequest $request) 
    {

        $user = User::create([
            'uuid' => Str::uuid(),
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)

        ]);

        // auth()->login($user);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}
