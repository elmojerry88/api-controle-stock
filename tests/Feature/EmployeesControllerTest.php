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

        $response = $this->get('/api/employee');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'name',
            'email',
            'phone',
        ]);

        $response->assertJson(fn (AssertableJson $json) =>

        $json->whereAllType([
            '0.name' => 'string',
            '0.email' => 'sting',
            '0.phone' => 'integer'
         ])
    
    );


    }
}
