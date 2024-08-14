<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveriesVehicleController extends Controller
{
    public function index()
    {
        $equipment = \App\Models\Deliveries_vehicle::all();

        return response()->json($equipment, 200);
    }

    public function deliver(\App\Http\Requests\DeliveriesVehicleDeliveryRequest $request)
    {
        dd($request->user());
   
        if(!Auth::user())
        {
            return response()->json(['message' => 'usuário não autenticado'], 401);
        }

        if ($request->user()->cannot('addDeliverVehicle', \App\Models\User::class)) {
            abort(403);
        }
        
        $user = Auth::user();
        
        $data = $request->validated();

        $data['delivered_by'] = $user->id;

        \App\Models\Deliveries_vehicle::create($data);

        return response()->json(['message' => 'entrega de veículo registrada com sucesso'], 201);
    }

    public function deliverReturn(\App\Http\Requests\DeliveriesEquipmentReturnRequest $request)
    {
        
        if(!Auth::user())
        {
            return response()->json(['message' => 'usuário não autenticado'], 401);
        }

        if ($request->user()->cannot('addReturnDeliverVehicle', \App\Models\User::class)) {
            abort(403);
        }

        $data = $request->validated();

        \App\Models\Deliveries_vehicle::find($data['deliverable_id'])->update($data);

        return response()->json(['message' => 'devolução de veículo registrada com sucesso'], 200);

    }
}
