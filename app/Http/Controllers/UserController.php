<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = $request->validated();

        $user['password'] = bcrypt($request->password);
        
        
        User::create($user);
        $message = 'usuário criado';
        return response($message,200);
    }

    /**
     * Display the specified resource.
     */
    // public function show()
    // {
        

    //     // $users = $users->count();

    //     return response()->json($users);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UserUpdateRequest $request, string $id)
    // {
    //     if ($request->password)
    //     {
    //         $request['password'] = bcrypt($request->password);
    //     }

    //     dd($request->validated());

    //     $user = User::findOrFail($id);

    //     $data = $request->validated();
        
    //     return response()->json('Usuário atualizado com sucesso');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     User::findOrFail($id)->delete();

    //     return response()->json('Usuario eliminado com sucesso');
    // }

 
}
