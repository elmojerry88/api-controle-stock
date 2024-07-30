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

        return response()->json($user, 200);
    }

 
    public function store(UserStoreRequest $request)
    {
        $user = $request->validated();

        $user['password'] = bcrypt($request->password);
        
        User::create($user);

        return response()->json(['message' => 'usuário criado com sucesso'],201);
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
                'email' => ['email ou senha incorreta'],
            ]);
        }

        $user->tokens()->delete();

        $data = [
            'token_type' => 'Bearer',
            'acess_token' => $user->createToken($request->email)->plainTextToken,
            'user' => $user,
        ];

        return response()->json($data, 200)
                         ->header('Content-Type', 'aplication/json');
    }

    public function logout()
    
    {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout feito com sucesso'], 200);
    }


 
    public function update(UserUpdateRequest $request, string $id)
    {
        if ($request->password)
        {
            $request['password'] = bcrypt($request->password);
        }

        $data = $request->validated();

        $user = User::findOrFail($id)->save($data);
        
        return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);
    }

  
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return response()->json(['message' => 'Usuario eliminado com sucesso'], 200);
    }

 
}
