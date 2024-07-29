<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_employees(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
