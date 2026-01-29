<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->create([
            'id' => 1,
            'name' => 'Todo',
        ]);
        Activity::factory()->create([
            'id' => 2,
            'name' => 'Doing',
        ]);
        Activity::factory()->create([
            'id' => 3,
            'name' => 'Testing',
        ]);
        Activity::factory()->create([
            'id' => 4,
            'name' => 'Verify',
        ]);
        Activity::factory()->create([
            'id' => 5,
            'name' => 'Done',
        ]);
    }
}
