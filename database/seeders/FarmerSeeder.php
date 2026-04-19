<?php

namespace Database\Seeders;

use App\Models\Farmer;
use App\Models\Society;
use App\Models\User;
use Illuminate\Database\Seeder;

class FarmerSeeder extends Seeder
{
    public function run(): void
    {
        $testUser = User::where('email', 'test@example.com')->first();
        Farmer::factory(3)->create(['user_id' => $testUser->id]);

    }
}
