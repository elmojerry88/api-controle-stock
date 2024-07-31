<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deliveries_equiments extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'deliverable_id',
        'delivered_by',
        'deliverable_type',
        'delivery_date',
        'return_date'
      ];

    public function employee(): HasMany
    {
      return $this->hasMany(\App\Models\Employees::class);
    }

    public function user(): HasMany
    {
      return $this->hasMany(\App\Models\User::class);
    }

    public function equimento(): HasMany
    {
      return $this->hasMany(\App\Models\Equipments::class);
    }
}
