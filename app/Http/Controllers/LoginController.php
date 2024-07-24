<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credencials = $request->only([
            'email',
            'password',
        ]);
        
        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        
        $user->tokens()->delete();

        $data = [
            'token' => $user->createToken($request->email)->plainTextToken,
            'user' => $user,
        ];

        return response($data, 200)
                    ->header('Content-Type', 'aplication/json');
    }


    public function logout()
    
    {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response()->json('LogOut com sucesso');
    }
}
