<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class EmployeesControllerTest extends TestCase
{
   use RefreshDatabase;

    public function test_get_all_employees(): void
    {
        \App\Models\Employees::factory()->createOne();

        $response = $this->getJson('/api/employee');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>

        $json->whereAllType([
            '0.name' => 'string',
            '0.email' => 'string',
            '0.phone' => 'string',
            '0.created_at' => 'string',
            '0.updated_at' => 'string',
            '0.id' => 'integer',
         ])
         ->hasAll([
            '0.name',
            '0.email',
            '0.phone',
            '0.created_at',
            '0.updated_at',
            '0.id'
         ]));
    }

    public function test_create_employess()
    {
        $employee = \App\Models\Employees::factory()->makeOne()->toArray();

        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->postJson('/api/employee/create', $employee);

        $response->assertStatus(201);

        $response->assertJson(['message' => 'employee criado com sucesso']);

    }
}
