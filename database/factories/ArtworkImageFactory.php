<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtworkImage>
 */
class ArtworkImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artwork = Artwork::inRandomOrder()->first();

        $imageTypes = ['pintura', 'escultura', 'fotografia', 'digital'];
        $imageType = $this->faker->randomElement($imageTypes);
        $imageNames = [
            'full_view',
            'detail_1',
            'detail_2',
            'angle_1',
            'angle_2',
            'close_up',
            'texture'
        ];

        return [
            'artwork_id' => $artwork->id,
            'path' => 'artworks/' .$artwork->id .'/' .$this->faker->randomElement($imageNames) .'.jpg',            
        ];
    }

    public function forArtwork(Artwork $artwork): static
    {
        return $this->state(fn(array $attributes) =>[
            'artwork_id' => $artwork->id,
        ]);
    }
}
