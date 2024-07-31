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

        $response->assertJson( fn (AssertableJson $json) =>
            
            $json->whereAll([
                'message' => 'employee criado com sucesso'
            ]));  
    }

    public function test_show_one_employees()
    {
        $employee = \App\Models\Employees::factory()->create();

        $response = $this->getJson("/api/employee/{$employee->id}");

        $response->assertStatus(200);

        $response->assertJson( fn (AssertableJson $json) =>

            $json->whereAllType([
                'name' => 'string',
                'email' => 'string',
                'phone' => 'string',
                'id' => 'integer',
                'created_at' => 'string',
                'updated_at' => 'string'

            ])
            ->hasAll([
                'name',
                'email',
                'phone',
                'id',
                'created_at',
                'updated_at'
            ]));
    }

    public function test_update_employee()
    {
        $employee = \App\Models\Employees::factory()->createOne();

        $update = ['name' => 'test user'];

        $response = $this->withHeader('Content-type', 'Aplication/jon')
                         ->putJson("/api/employee/update/{$employee->id}", $update);
        
        $response->assertStatus(200);

        $response->assertJson(['message' => 'employee atualizado com sucesso']);
    }

    public function test_delete_employee_()
    {
        $employee = \App\Models\Employees::factory()->createOne();

        $response = $this->withHeader('Content-Type', 'application/json')
                         ->deleteJson("/api/employee/delete/{$employee->id}");
        
        $response->assertStatus(200);

        $response->assertJson(['message' => 'employee deletado com sucesso']);
    }
}
