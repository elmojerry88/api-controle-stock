<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;

class UserControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_get_all_user(): void
    {
        $user = \App\Models\User::factory()->createOne();

        $response = $this->getJson('/api/user');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
                $json->whereAllType([
                        '0.id' => 'integer',
                        '0.name' => 'string',
                        '0.email' => 'string',
                        '0.role' => 'string',
                    ])
                    ->hasAll([
                        '0.id', 
                        '0.name',
                        '0.email',
                        '0.role'
                    ])
                );
    }

    public function test_login_user(): void
    {
        $credencials = [
            'name' => 'test user',
            'email' => 'test@example.com',
            'password' => bcrypt('secret12345')
        ];

        \App\Models\User::factory()->create($credencials);

        $user = [
            'email' => 'test@example.com',
            'password' => 'secret12345'
        ];

        $response = $this->postJson('/api/user/login', $user);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'token_type',
            'acess_token',
            'user' => 
            [
                'id',
                'name',
                'email',
                'role',
            ]
            
        ]);

        $response->assertJson(fn (AssertableJson $json) => 
            $json->whereAllType([
                'token_type' => 'string',
                'acess_token' => 'string',
                'user' => 'array',
                'user.id' => 'integer',
                'user.name' => 'string',
                'user.email' => 'string',
                'user.role' => 'string',
            ])
        
    );
    }

    // public function logout_user_test(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function create_user_test(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function update_user_test(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function destroy_user_test(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
