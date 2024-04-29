<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\User;
use App\Models\Website;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);
        $test = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);

        Website::factory(3)->create([
            'user_id' => $admin->id
        ]);

        $websites = Website::all();

        foreach ($websites as $website) {
            Issue::factory(5)->create([
                "website_id" => $website->id,
                'user_id' => $admin->id
            ]);
        }
    }
}
