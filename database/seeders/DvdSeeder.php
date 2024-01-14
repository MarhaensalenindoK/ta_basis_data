<?php

namespace Database\Seeders;

use App\Models\Dvd;
use App\Services\DVDIDGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DvdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstDvd = Dvd::factory()->create([
            'DVDID' => DVDIDGenerator::generateId(null),
            'judul' => 'Die Another Day',
            'nama_pemeran' => 'Pierce Brosnan',
        ]);

        $lastId = $firstDvd->DVDID;
        for ($i = 1; $i <= 10; $i++) {
            $dvd = Dvd::factory()->create([
                'DVDID' => DVDIDGenerator::generateId($lastId),
            ]);

            $lastId = $dvd->DVDID;
        }
    }
}
