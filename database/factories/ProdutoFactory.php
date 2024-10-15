<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=> $this->faker->unique()->word,
            'descrição'=>$this->faker->paragraph(),
            'preco'=>$this->faker->randomNumber(2),
            'imagem'=>$this->faker->imageUrl(400,400),
            //'id_user'=>User::pluck('id')->random(),
        ];
    }
}
