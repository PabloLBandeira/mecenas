<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->admin()->count(2)->create([
        'password' => Hash::make('password')
       ]);

       User::factory()->moderator()->count(2)->create([
        'password' => Hash::make('password')
       ]);

       User::factory()->artist()->count(50)->create([
        'password' => Hash::make('password')
       ]);

       User::factory()->customer()->count(150)->create([
        'password' => Hash::make('password')
       ]);
    }
}
