<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder atau factory User di sini
        \App\Models\User::factory()->create([
            'first_name' => 'Khalisha',
            'last_name' => 'Adzraini',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'address' => 'Alamat contoh',
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
        ]);
    }

    
}
