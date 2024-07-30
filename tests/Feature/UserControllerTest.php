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

    public function test_logout_user(): void
    {
        $user = Sanctum::actingAs(
            \App\Models\User::factory()->createOne()
        )->toArray();

        $response = $this->postJson('/api/user/logout');

        $response->assertStatus(200);

        $response->assertJson(['message' => 'Logout feito com sucesso']);
    }

    public function test_create_user(): void
    {
        $user = \App\Models\User::factory()->makeOne()->toArray();

        $user['password'] = 'secret12345';

        $response = $this->postJson('/api/user/create', $user);

        $response->assertStatus(201);

        $response->assertJson(['message' => 'usuário criado com sucesso']);
    }

    public function test_update_user(): void
    {
        $user = \App\Models\User::factory()->create();

        $update = ['name' => 'test user'];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->postJson("/api/user/update/{$user->id}", $update);

        $response->assertStatus(200);

        $response->assertJson(['message' => 'Usuário atualizado com sucesso']);
    }

    public function test_destroy_user(): void
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->deleteJson('/api/user/delete/{$user->id}');

        $response->assertStatus(200);

        $response->assertJson(['message' => 'Usuario eliminado com sucesso']);
    }
}
