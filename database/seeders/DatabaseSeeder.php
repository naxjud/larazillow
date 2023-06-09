<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Normal User 2',
            'email' => 'user2@example.com',
        ]);

        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 1
        ]);

        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 2
        ]);

        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 3
        ]);
    }
}
