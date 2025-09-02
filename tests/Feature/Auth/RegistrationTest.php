<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {        
        $user = User::factory()->create([
            'email' => 'test' . uniqid() . '@example.com',
        ]); 

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);

        $user = User::where('email', $user->email)->first();

        $this->actingAs($user);

        $this->assertAuthenticated();
    }
}
