<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wish;
use App\Models\WishComments;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishes = Wish::where('status', 'ativo')->get();
        $users = User::all();

        foreach ($wishes as $wish) {
            $mainComments = WishComments::factory()
                ->count(rand(2,4))
                ->create([
                    'wish_id' => $wish->id,
                    'user_id' => $users->random()->id,
                ]);
        
        foreach ($mainComments as $mainComment) {
        $replies = WishComments::factory()
            ->count(rand(1,3))
            ->reply()
            ->create([
                'wish_id' => $wish->id,
                'user_id' => $users->random()->id,
            ]);
            
        foreach ($replies as $reply) {
            if (rand(0,1)) {
                WishComments::factory()
                    ->count(rand(1,3))
                    ->create([
                        'wish_id' => $wish->id,
                        'user_id' => $users->random()->id,
                        'parent_id' => $reply->id,
                    ]);
                    }
                }
            }
        }
        $this->command->info('Wish comments seeded successfully with hierarchical structure!');

    }
}
