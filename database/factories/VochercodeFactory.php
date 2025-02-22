<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vochercode;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vochercode>
 */
class VochercodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vochercode::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numerify(str_repeat('#', 16)), // 16 angka unik
            'code' => strtoupper($this->faker->bothify('VOC-####-####')), // Format kode voucher
            'point' => 10,
            'status' => 'belum terpakai',
        ];
    }
}
