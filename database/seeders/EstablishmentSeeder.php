<?php

namespace Database\Seeders;

use App\Models\Establishment;
use App\Models\Farmer;
use Illuminate\Database\Seeder;

class EstablishmentSeeder extends Seeder
{
    public function run(): void
    {
        Farmer::all()->each(function (Farmer $farmer) {
            Establishment::factory(2)->create(['farmer_id' => $farmer->id]);
        });
    }
}
