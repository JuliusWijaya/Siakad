<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nid'   => $this->faker->randomNumber(6, true),
            'nama'  => $this->faker->name(),
            'tgl_lahir' => $this->faker->date('d_m_Y'),
            'alamat'    => $this->faker->address()
        ];
    }
}
