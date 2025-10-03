<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wish;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Wish::factory()
            ->count(rand(1,2))
            ->create([
                'user_id' => $user->id,
            ]);
        }

        $this->command->info('Wishes seeded successfully for all users!');

    }
}
