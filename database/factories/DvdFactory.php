<?php

namespace Database\Factories;

use App\Models\Dvd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dvd>
 */
class DvdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Dvd::class;

    public function definition(): array
    {
        return [
            'DVDID' => $this->faker->unique()->numerify('DVD###'),
            'judul' => $this->faker->sentence(3),
            'nama_pemeran' => $this->faker->name
        ];
    }
}
