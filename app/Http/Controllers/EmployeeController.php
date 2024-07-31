<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = \App\Models\Employees::all();

        return response()->json($employee, 200);
    }

    public function store(\App\Http\Requests\EmployeeStoreRequest $request)
    {
        $data = $request->validated();

        \App\Models\Employees::create($data);

        return response()->json(['message' => 'Employees criado com sucesso'], 201);
    }

    public function show(string $id)
    {
        $employee = \App\Models\Employees::find($id)->first();

        return response()->json($employee, 200);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validated();

        \App\Models\Employees::find($id)->save($data);

        return response()->json(['message' => 'employees atualizado com sucesso'], 200);
    }

    public function delete(string $id) 
    {
        \App\Models\Employees::findOrFail($id)->delete();

        return response()->json(['message' => 'employee deletado com sucesso'], 200);
    }
}
