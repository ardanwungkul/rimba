<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_validates_user_creation()
    {
        $data = [
            'email' => 'not-an-email-format',
            'age' => 'abc',
        ];

        $response = $this->postJson('api/users', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'age']);
    }
    public function test_create_user()
    {
        $data = [
            'name'  => 'Ardan',
            'email' => 'ardan@example.com',
            'age'   => 22,
        ];

        $response = $this->postJson('api/users', $data);

        $response->assertStatus(201)->assertJsonFragment(['email' => 'ardan@example.com']);
        $this->assertDatabaseHas('users', ['email' => 'ardan@example.com']);
    }

    public function test_list_user()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('api/users');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }
    public function test_show_user()
    {
        $user = User::factory()->create();

        $response = $this->getJson("api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['email' => $user->email]);
    }
    public function test_update_user()
    {
        $user = User::factory()->create();

        $response = $this->putJson("api/users/{$user->id}", [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'age' => 30,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['email' => 'updated@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'updated@example.com']);
    }
    public function test_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'User deleted successfully']);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
