<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeliveriesVehiclePolicy
{
    public function addDeliverVehicle(User $user) : Response
    {
        return $user->role === 'admin' || $user->role === 'gestor de equipamento'         
        ? Response::allow()
        : Response::deny('Usuário com autorização insuficiente');
              
    }

    public function addReturnDeliverVehicle(User $user) : Response
    {
        return $user->role === 'admin' || $user->role === 'gestor de equipamento'  
                ? Response::allow()
                : Response::deny('Usuário com autorização insuficiente');
    }
}
