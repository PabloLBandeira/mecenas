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
        $imageUrl = 'https://picsum.photos/1200/800?random=' . uniqid();

        return [
            'artwork_id' => Artwork::factory(),
            'path' => $imageUrl,
        ];
    }

    public function forArtwork(Artwork $artwork): static
    {
        return $this->state(fn(array $attributes) =>[
            'artwork_id' => $artwork->id,
        ]);
    }
}
