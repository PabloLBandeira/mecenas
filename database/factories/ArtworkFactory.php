<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Pintura' => ['Óleo', 'Acrílica', 'Aquarela'],
            'Escultura' => ['Pedra', 'Metal', 'Argila'],
            'Fotografia' => ['Paisagem', 'Retrato', 'Abstrata'],
            'Digital' => ['Ilustração', '3D', 'Vetor'],
        ];

        $category = $this->faker->randomElement(array_keys($categories));
        $subCategory = $this->faker->randomElement($categories[$category]);

        $user = User::where('role', 'artist')->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'category' => $category,
            'sub_category' => $subCategory,
            'price' => $this->faker->numberBetween(10000, 10000000),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
        ];
    }
}
