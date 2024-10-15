<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Produto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->unique()->word,
            'descrição'=>$this->faker->paragraph(),
            'preco'=>$this->faker->randomNumber(),
            'imagem'=>$this->faker->imageUrl(400,400),
            'id_user'=>User::pluck('id')->random(),
            'id_produto'=>Produto::pluck('id')->random()
        ];
    }
}
