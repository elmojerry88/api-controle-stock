<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;

class DeliveriesVehicleControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_all_deliveries_evehicle(): void
    {
        Sanctum::actingAs(
            \App\Models\User::factory()->createOne()
        )->toArray();

        $data = \App\Models\Deliveries_vehicle::factory()->create();

        $response = $this->get('/api/delivery/vehicle');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->whereAll([
                '0.employee_id' => $data['employee_id'],
                '0.deliverable_id' => $data['deliverable_id'],
                '0.delivered_by' => $data['delivered_by'],
                '0.deliverable_type' => $data['deliverable_type'],
                '0.delivery_date' => $data['delivery_date'],
                '0.return_date' => $data['return_date'],
            ])
            ->whereAllType([
                '0.employee_id' => 'integer',
                '0.deliverable_id' => 'integer',
                '0.delivered_by' => 'integer',
                '0.deliverable_type' => 'string',
                '0.delivery_date' =>'string',
                '0.return_date' => 'null|string',
                '0.created_at' => 'string',
                '0.updated_at' => 'string',
            ])
            ->hasAll([
                '0.employee_id',
                '0.deliverable_id',
                '0.delivered_by',
                '0.deliverable_type',
                '0.delivery_date',
                '0.return_date',
                '0.created_at',
                '0.updated_at'
            ]));
    }

    public function test_register_delivery_vehicle()
    {
        Sanctum::actingAs(
            \App\Models\User::factory()->createOne()
        );

        $equipment = \App\Models\Deliveries_vehicle::factory()->create()->toArray();

        $response = $this->withHeader('Content-Type', 'application/json')
                         ->postJson('/api/delivery/vehicle/deliver', $equipment);

        $response->assertStatus(201);

        $response->assertJson(['message' => 'entrega de equipamento registrada com sucesso']);

    }

    public function test_fail_register_vehicle_with_unauthenticated_user()
    {
        $equipment = [
            'employee_id' => \App\Models\Employees::factory()->create()->id,
            'deliverable_id' => \App\Models\Vehicles::factory()->create()->id,
            'deliverable_type' => 'equipment',
        ];

        $response = $this->withHeader('Content-Type', 'application/json')
                         ->postJson('/api/delivery/vehicle/deliver', $equipment);

        $response->assertStatus(401);

        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function test_return_vehicle()
    {
        Sanctum::actingAs(
            \App\Models\User::factory()->createOne()
        );

        $delivery = \App\Models\Deliveries_vehicle::factory()->createOne();

        $delivery = [
            'return_date' => fake()->date('d-m-Y', 'now'),
            'deliverable_id' => $delivery->deliverable_id
        ];

        $response = $this->withHeader('Content-Type', 'application/json')
                         ->postJson('/api/delivery/vehicle/return',$delivery );

        $response->assertStatus(200);

        $response->assertJson(['message' => 'devolução de equipamento registrada com sucesso']);
    }
}
