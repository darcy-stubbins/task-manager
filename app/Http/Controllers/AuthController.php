<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if (Hash::check($validated['password'], $user->password)) {
            $user->tokens()->delete();
            return $user->createToken($validated['token_name'])->plainTextToken;
        }
        return 'incorrect password';
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    public function createUser(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name'=>$request->name, 
            'email'=>$request->email,
            'password'=>Hash::make($request->password), 
        ]); 
        return $user->createToken($validated['token_name'])->plainTextToken;
    }
}
