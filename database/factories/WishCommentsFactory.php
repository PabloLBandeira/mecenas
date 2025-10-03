<?php

namespace Database\Factories;

use \App\Models\User;
use \App\Models\Wish;
use \App\Models\WishComments;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WishComments>
 */
class WishCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wish = Wish::where('status', 'ativo')
            ->inRandomOrder()
            ->first();

        $user = User::inRandomOrder()->first();

        return [
            'wish_id' => $wish->id,
            'user_id' => $user->id,
            'content' => $this->faker->paragraph(2,true),
            'parent_id' => null,
        ];
    }

    public function reply(): static
    {
        return $this->state(fn(array $attributes) => [
            'parent_id' => WishComments::where('wish_id', $attributes['wish_id'])
            ->inRandomOrder()
            ->first()?->id ?? null,
        ]);
    }

    public function withReplies(): static
    {
        return $this->afterCreating(function (WishComments $comment) {
            WishComments::factory()
            ->count($this->faker->numberBetween(1,3))
            ->reply()
            ->create([
                'wish_id' => $comment->wish_id,
            ]);
        });
    }
}
