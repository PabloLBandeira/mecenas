<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkImage;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = Artwork::all();

        foreach ($artworks as $artwork) {
            $numberOfImages = rand(3,7);

            ArtworkImage::factory()
            ->count($numberOfImages)
            ->create([
                'artwork_id' => $artwork
            ]);
        }
        
        $this->command->info("Artwork images seeded successfully! Created 3-7 images for each of {$artworks->count()} artworks.");
    }
}
