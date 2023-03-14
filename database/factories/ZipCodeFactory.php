<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZipCode>
 */
class ZipCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'd_codigo' => $this->faker->numerify('#####'),
            'd_asenta' => $this->faker->city(),
            'd_tipo_asenta' =>  $this->faker->randomElement(['Colonia','Unidad habitacional','Fraccionamiento']) ,
            'D_mnpio' => $this->faker->city(),
            'd_estado' => $this->faker->word(),
            'd_ciudad' => $this->faker->word(),
            'd_CP' => $this->faker->numerify('#####'),
            'c_estado' => $this->faker->numerify('##'),
            'c_oficina' => $this->faker->numerify('#####'),
            'c_CP' => null ,
            'c_tipo_asenta' => $this->faker->numerify('##'),
            'c_mnpio' => $this->faker->numerify('###'),
            'id_asenta_cpcons' => $this->faker->numerify('####'),
            'd_zona' => $this->faker->randomElement(['Urbano','Rural']) ,
            'c_cve_ciudad' => $this->faker->numerify('##'),
        ];
    }
}
