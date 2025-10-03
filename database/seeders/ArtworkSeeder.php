<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = User::where('role', 'artist')->get();

        foreach ($artists as $artist) {
            Artwork::factory()
            ->count(rand(2,5))
            ->create([
                'user_id' => $artist->id,
            ]);
        }
    }
}
