<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

 
    public function store(UserStoreRequest $request)
    {
        $user = $request->validated();

        $user['password'] = bcrypt($request->password);
        
        User::create($user);

        return response()->json(['message' => 'usuário criado com sucesso'],200);
    }

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
            'token_type' => 'Bearer',
            'acess_token' => $user->createToken($request->email)->plainTextToken,
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


 
    public function update(UserUpdateRequest $request, string $id)
    {
        if ($request->password)
        {
            $request['password'] = bcrypt($request->password);
        }

        dd($request->validated());

        $user = User::findOrFail($id);

        $data = $request->validated();
        
        return response()->json('Usuário atualizado com sucesso');
    }

  
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return response()->json('Usuario eliminado com sucesso', 200);
    }

 
}
