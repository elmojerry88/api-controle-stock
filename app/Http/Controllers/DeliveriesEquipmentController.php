<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveriesEquipmentController extends Controller
{
    public function index()
    {
        $equipment = \App\Models\Deliveries_equiments::all();

        return response()->json($equipment, 200);
    }

    public function deliver(Request $request)
    {
        $data = $request->validated();

        \App\Models\Deliveries_equiments::create($data);

        return response()->json(['message' => 'entrega registrada com sucesso'], 200);
    }

    public function deliverReturn()
    {
        //
    }
}
