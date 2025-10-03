<?php

namespace Database\Seeders;

use App\Models\ArtworkComments;
use App\Models\ArtworkImage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        UserSeeder::class,
        ArtworkSeeder::class,
        ArtworkImageSeeder::class,
        ArtworkCommentsSeeder::class,
        WishSeeder::class,
        WishCommentsSeeder::class,
       ]); 
    }
}
