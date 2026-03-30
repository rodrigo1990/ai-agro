<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Fixed test user; remaining users created by factories (e.g. SocietyFactory)
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            SocietySeeder::class,     // depends on: users
            TagSeeder::class,         // depends on: societies
            ContractorSeeder::class,  // no deps
            LaborTypeSeeder::class,   // no deps
            CropPlanSeeder::class,    // no deps
            FarmerSeeder::class,      // depends on: societies
            EstablishmentSeeder::class, // depends on: farmers
            PlotSeeder::class,        // depends on: farmers, establishments, users
            CampaignSeeder::class,    // depends on: farmers, establishments, plots, crop_plans
            TaggingSeeder::class,     // depends on: tags + all taggable entities
        ]);
    }
}
