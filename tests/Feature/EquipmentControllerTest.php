<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class EquipmentControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_all_equipments(): void
    {
        $data = \App\Models\Equipments::factory()->create();

        $response = $this->getJson('/api/equipment');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>

            $json->whereAll([
                '0.name' => $data['name'],
                '0.description' => $data['description'],
                '0.serial_number' => $data['serial_number']
            ])
            ->hasAll([
                '0.name',
                '0.description',
                '0.serial_number'
            ])
            ->whereAllType([
                '0.name' => 'string',
                '0.description' => 'string',
                '0.serial_number' => 'string'
            ])
        );
    }

    // public function test_show_one_equipment(): void
    // {
    //     $data = \App\Models\Equipments::factory()->create();

    //     $response = $this->getJson("/api/equipment/{$data->id}");

    //     $response->assertStatus(200);
    // }

    // public function test_create_equiment(): void
    // {
    //     $response = $this->postJson('/');

    //     $response->assertStatus(201);
    // }

    // public function test_update_equipment(): void
    // {
    //     $response = $this->postJson("/");

    //     $response->assertStatus(200);
    // }

    // public function test_delete_equipment(): void
    // {
    //     $response = $this->deleteJson("/");

    //     $response->assertStatus(200);
    // }
}
