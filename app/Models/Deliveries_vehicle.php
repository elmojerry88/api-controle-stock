<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveries_vehicle extends Model
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
}
