<?php

namespace Database\Seeders;

use App\Models\Society;
use App\Models\User;
use Illuminate\Database\Seeder;

class SocietySeeder extends Seeder
{
    public function run(): void
    {
        $testUser = User::where('email', 'test@example.com')->first();

        // Primary society tied to the test user
        Society::factory()->create([
            'user_id'       => $testUser->id,
            'business_name' => 'Agro Test S.A.',
            'tax_id'        => '30-12345678-9',
            'country'       => 'Argentina',
        ]);

        // One additional society with its own user
        Society::factory()->create([
            'business_name' => 'Campo Verde S.R.L.',
            'country'       => 'Argentina',
        ]);
    }
}
