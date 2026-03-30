<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CropPlan;
use App\Models\Plot;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $cropPlans = CropPlan::all();

        Plot::with('establishment')->get()->each(function (Plot $plot) use ($cropPlans) {
            $count = rand(1, 2);

            Campaign::factory($count)->create([
                'farmer_id'        => $plot->farmer_id,
                'establishment_id' => $plot->establishment_id,
                'plot_id'          => $plot->id,
                'crop_plan_id'     => $cropPlans->random()->id,
            ]);
        });
    }
}
