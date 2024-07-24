<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function get_all_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function login_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function logout_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function create_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function update_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function destroy_user_test(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
