<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $data = \App\Models\Equipments::all();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        \App\Models\Equipments::create($data);

        return response()->json(['message' => 'equipamento criado com sucesso'], 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validated();

        \App\Models\Equipments::findOrFail($id)->saveOrFail($data);

        return response()->json(['message' => 'equipamento atualizado com sucesso'],200);
    }

    public function destroy($id)
    {
        \App\Models\Equipments::findOrFail($id)->delete();

        return response()->json(['message' => 'equipamento eliminado com sucesso'],200);
    }
}
