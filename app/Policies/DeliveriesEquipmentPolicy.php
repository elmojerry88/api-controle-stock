<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeliveriesEquipmentPolicy
{

    public function addDeliverEquipment(User $user) : Response
    {
        return $user->role === 'admin' || $user->role === 'gestor de equipamento'         
        ? Response::allow()
        : Response::deny('Usuário com autorização insuficiente');
              
    }

    public function addReturnDeliverEquipment(User $user) : Response
    {
        return $user->role === 'admin' || $user->role === 'gestor de equipamento'  
                ? Response::allow()
                : Response::deny('Usuário com autorização insuficiente');
    }
}
