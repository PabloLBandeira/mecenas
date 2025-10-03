<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\ArtworkComments;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtworkComments>
 */
class ArtworkCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artwork = Artwork::where('status', 'ativo')
            ->inRandomOrder()
            ->first();
        $user = User::inRandomOrder()->first();
        
        return [
            'artwork_id' => $artwork->id,
            'user_id' => $user->id,
            'content' => $this->faker->paragraphs(2, true),
            'parent_id' => null,
        ];
    }

    public function reply(): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => ArtworkComments::where('artwork_id', $attributes['artwork_id'])
                ->inRandomOrder()
                ->first()?->id ?? null,
        ]);
    }

    public function withReplies(): static
    {
        return $this->afterCreating(function (ArtworkComments $comment) {
            ArtworkComments::factory()
                ->count($this->faker->numberBetween(1,3))
                ->reply()
                ->create([
                'artwork_id' => $comment->artwork_id,
            ]);
        });
    }
}
