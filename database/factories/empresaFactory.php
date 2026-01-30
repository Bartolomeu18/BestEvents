<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessDescription;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\empresa>
 */
class empresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'nif' => $this->faker->numerify('##########'),
            'telefone' => $this->faker->phoneNumber(),
            'logo' => $this->faker->url(),
        ];
    }
}
