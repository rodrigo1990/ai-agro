<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Establishment;
use App\Models\Farmer;
use App\Models\Plot;
use App\Models\Society;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class TaggingSeeder extends Seeder
{
    public function run(): void
    {
        Society::with(['tags', 'farmers.establishments.plots'])->get()
            ->each(function (Society $society) {
                $tags = $society->tags;

                if ($tags->isEmpty()) {
                    return;
                }

                $society->farmers->each(function (Farmer $farmer) use ($tags) {
                    $this->attachRandom($farmer->tags(), $tags);

                    $farmer->establishments->each(function (Establishment $establishment) use ($tags) {
                        $this->attachRandom($establishment->tags(), $tags);

                        $establishment->plots->each(function (Plot $plot) use ($tags) {
                            $this->attachRandom($plot->tags(), $tags);
                        });
                    });
                });

                Campaign::whereIn('farmer_id', $society->farmers->pluck('id'))
                    ->get()
                    ->each(fn (Campaign $campaign) => $this->attachRandom($campaign->tags(), $tags));
            });
    }

    private function attachRandom($relation, Collection $tags): void
    {
        $count = rand(0, 3);
        if ($count === 0) {
            return;
        }
        $relation->attach($tags->random(min($count, $tags->count()))->pluck('id'));
    }
}
