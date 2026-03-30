<?php

namespace Database\Seeders;

use App\Models\LaborType;
use Illuminate\Database\Seeder;

class LaborTypeSeeder extends Seeder
{
    private const LABOR_TYPES = [
        ['description' => 'Siembra directa soja',       'work_order_type' => 'Orden de siembra',        'category' => null],
        ['description' => 'Siembra directa maíz',       'work_order_type' => 'Orden de siembra',        'category' => null],
        ['description' => 'Siembra convencional trigo',  'work_order_type' => 'Orden de siembra',        'category' => null],
        ['description' => 'Aplicación herbicida pre',   'work_order_type' => 'Orden de aplicación',     'category' => 'Herbicida'],
        ['description' => 'Aplicación herbicida post',  'work_order_type' => 'Orden de aplicación',     'category' => 'Herbicida'],
        ['description' => 'Aplicación fungicida',       'work_order_type' => 'Orden de aplicación',     'category' => 'Fungicida'],
        ['description' => 'Aplicación insecticida',     'work_order_type' => 'Orden de aplicación',     'category' => 'Insecticida'],
        ['description' => 'Fertilización base',         'work_order_type' => 'Orden de fertilización',  'category' => 'Fertilizante'],
        ['description' => 'Fertilización cobertura',   'work_order_type' => 'Orden de fertilización',  'category' => 'Fertilizante'],
        ['description' => 'Cosecha soja',               'work_order_type' => 'Orden de cosecha',        'category' => null],
        ['description' => 'Cosecha maíz',               'work_order_type' => 'Orden de cosecha',        'category' => null],
        ['description' => 'Labranza primaria',          'work_order_type' => 'Orden de labranza',       'category' => null],
    ];

    public function run(): void
    {
        foreach (self::LABOR_TYPES as $data) {
            LaborType::factory()->create($data);
        }
    }
}
