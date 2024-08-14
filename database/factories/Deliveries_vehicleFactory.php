<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deliveries_vehicle>
 */
class Deliveries_vehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => \App\Models\Employees::factory()->create(),
            'deliverable_id' => \App\Models\Vehicles::factory()->create(),
            'delivered_by' => \App\Models\User::factory()->create(),
            'deliverable_type' => 'vehicles',
            'delivery_date' => now(),
            'return_date' => null
        ];
    }
}
