<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkComments;
use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = Artwork::where('status', 'ativo')->get();
        $user = User::all();

        foreach ($artworks as $artwork) {
            $mainComments = ArtworkComments::factory()
            ->count(rand(2,5))
            ->create([
                'artwork_id' => $artwork->id,
                'user_id' => $user->random()->id,
                'parent_id' => null,
            ]);

        foreach ($mainComments as $mainComment) {
            $replies = ArtworkComments::factory()
            ->count(rand(1,3))
            ->create([
                'artwork_id' => $artwork->id,
                'user_id' => $user->random()->id,
                'parent_id' => $mainComment->id,
            ]);

        foreach ($replies as $reply) {
            if (rand(0,1)) {
                ArtworkComments::factory()
                ->count(rand(1,2))
                ->create([
                'artwork_id' => $artwork->id,
                'user_id' => $user->random()->id,  
                'parent_id' => $reply->id,
                ]);
            }
        }
        }
        }
    $this->command->info('Artwork comments seeded successfully with hierarchical structure!');

    }
}
