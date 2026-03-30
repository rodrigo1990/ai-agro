<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Seeder;

class ContractorSeeder extends Seeder
{
    public function run(): void
    {
        // One "own" contractor representing the account owner
        Contractor::factory()->own()->create([
            'name'  => 'Servicios Propios S.A.',
            'email' => 'admin@agro-test.com',
        ]);

        // External contractors
        Contractor::factory(7)->create();
    }
}
