<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveriesEquipmentController extends Controller
{
    public function index()
    {
        $equipment = \App\Models\Deliveries_equipments::all();

        return response()->json($equipment, 200);
    }

    public function deliver(\App\Http\Requests\DeliveriesEquipmentDeliveryRequest $request)
    {
        
        if(!Auth::user())
        {
            return response()->json(['message' => 'usuário não autenticado'], 401);
        }
        
        $user = Auth::user();
        
        $data = $request->validated();

        $data['delivered_by'] = $user->id;

        $data['delivery_date'] = now();

        \App\Models\Deliveries_equipments::create($data);

        return response()->json(['message' => 'entrega de equipamento registrada com sucesso'], 201);
    }

    public function deliverReturn(Request $request)
    {
        if(!Auth::user())
        {
            return response()->json(['message' => 'usuário não autenticado'], 401);
        }

        $data = $request->validated();

        $data['return_date'] = now();

        \App\Models\Deliveries_equipments::find($data->deliverable_id)->save($data->return_date);

        return response()->json(['message' => 'devolução de equipamento registrada com sucesso'], 200);
    }
}
