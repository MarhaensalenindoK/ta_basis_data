<?php

namespace Database\Seeders;

use App\Models\Dvd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DvdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dvd::factory(1)->create([
            'judul' => 'Die Another Day',
            'nama_pemeran' => 'Pierce Brosnan',
        ]);
        Dvd::factory(10)->create();
    }
}
