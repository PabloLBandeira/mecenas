<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wish;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wish>
 */
class WishFactory extends Factory
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
            'Escultura' => ['Madeira', 'Metal', 'Argila'],
            'Fotografia' => ['Paisagem', 'Retrato', 'Abstrata'],
            'Digital' => ['Ilustração', '3D', 'Vector'],
        ];

        $category = $this->faker->randomElement(array_keys($categories));
        $subcategory = $this->faker->randomElement($categories[$category]);
        
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3, true),
            'category' => $category,
            'sub_category' => $subcategory,
            'budget' => $this->faker->numberBetween(1000, 1000000000),
            'status' => 'ativo',
        ];
    }
}