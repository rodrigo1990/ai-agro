<?php

namespace Database\Seeders;

use App\Models\Farmer;
use App\Models\Society;
use Illuminate\Database\Seeder;

class FarmerSeeder extends Seeder
{
    public function run(): void
    {
        Society::all()->each(function (Society $society) {
            Farmer::factory(3)->create(['society_id' => $society->id]);
        });
    }
}
