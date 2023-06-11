<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Duc Huy',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => 1,
            'email_verified_at' => Carbon::now(),
            'is_default' => 1,
        ]);
    }
}
