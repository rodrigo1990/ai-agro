<?php

namespace Database\Seeders;

use App\Models\Establishment;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Database\Seeder;

class PlotSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        Establishment::all()->each(function (Establishment $establishment) use ($users) {
            Plot::factory(3)->create([
                'farmer_id'        => $establishment->farmer_id,
                'establishment_id' => $establishment->id,
            ]);
        });
    }
}
