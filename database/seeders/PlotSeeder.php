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
            ])->each(function (Plot $plot) use ($users) {
                // Assign 1–2 random users to each plot via the pivot
                $plot->users()->attach(
                    $users->random(min(rand(1, 2), $users->count()))->pluck('id')
                );
            });
        });
    }
}
