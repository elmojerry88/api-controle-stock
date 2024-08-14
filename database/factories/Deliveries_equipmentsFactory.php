<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deliveries_equipments>
 */
class Deliveries_equipmentsFactory extends Factory
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
            'deliverable_id' => \App\Models\Equipments::factory()->create(),
            'delivered_by' => \App\Models\User::factory()->create(),
            'deliverable_type' => 'equipment',
            'delivery_date' => fake()->date('d-m-Y', 'now'),
            'return_date' => null
        ];
    }
}
