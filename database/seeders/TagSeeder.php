<?php

namespace Database\Seeders;

use App\Models\Society;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    private const TAGS = [
        ['name' => 'Prioridad Alta',  'color' => '#e53e3e'],
        ['name' => 'Prioridad Media', 'color' => '#dd6b20'],
        ['name' => 'Revisión',        'color' => '#d69e2e'],
        ['name' => 'Aprobado',        'color' => '#38a169'],
        ['name' => 'Orgánico',        'color' => '#2f855a'],
        ['name' => 'Riego',           'color' => '#3182ce'],
        ['name' => 'Sin Riego',       'color' => '#718096'],
    ];

    public function run(): void
    {
        Society::all()->each(function (Society $society) {
            foreach (self::TAGS as $tag) {
                Tag::factory()->create([
                    'society_id' => $society->id,
                    'name'       => $tag['name'],
                    'color'      => $tag['color'],
                ]);
            }
        });
    }
}
