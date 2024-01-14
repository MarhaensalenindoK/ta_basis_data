<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teman;
use App\Services\TIDGenerator;

class TemanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lastId = null;
        for ($i = 1; $i <= 10; $i++) {
            $teman = Teman::factory()->create([
                'TID' => TIDGenerator::generateId($lastId),
            ]);

            $lastId = $teman->TID;
        }
    }
}
