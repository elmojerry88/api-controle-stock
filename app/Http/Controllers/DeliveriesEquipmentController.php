<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveriesEquipmentController extends Controller
{
    public function index()
    {
        $equipment = \App\Models\Deliveries_equiments::all();

        return response()->json($equipment, 200);
    }

    public function deliver(\App\Http\Requests\DeliveriesEquipmentDeliveryRequest $request)
    {
        if(!Auth::user())
        {
            return response()->json(['message' => 'usuário não autenticado'], 403);
        }
        
        $user = Auth::user();
        
        $data = $request->validated();

        $data['deliverd_by'] = $user->id;

        \App\Models\Deliveries_equiments::create($data);

        return response()->json(['message' => 'entrega registrada com sucesso'], 200);
    }

    public function deliverReturn()
    {
        //
    }
}
