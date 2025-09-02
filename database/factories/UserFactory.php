<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone1' => $this->faker->cellphoneNumber(),
            'phone2' => $this->faker->cellphoneNumber(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'neighborhood' => $this->faker->streetName(),
            'street' => $this->faker->streetAddress(),
            'number' => $this->faker->buildingNumber(),
            'zip_code' => $this->faker->postcode(),
            'bio' => $this->faker->paragraph(3),
            'avatar' => $this->faker->imageUrl(200, 200, 'people'),
            'status' => 'ativo',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function admin(): static
    {
        return $this->state(fn (array $atributes) => [
            'role' => 'admin',
            'bio' => null,
        ]);
    }

    public function moderator(): static
    {
        return $this->state(fn (array $atributes) => [
            'role' => 'moderator',
            'bio' => null,
        ]);
    }

    public function customer(): static
    {
        return $this->state(fn (array $atributes) => [
            'role' => 'customer',
            'bio' => null,
        ]);
    }

    public function artist(): static
    {
        return $this->state(fn (array $atributes) => [
            'role' => 'artist',
        ]);
    }

    public function unverified(): static 
    {
        return $this->state(fn(array $atributes) => [
            'email_verified_at' => null
        ]);
    }
}
