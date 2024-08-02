<?php

namespace Database\Factories;

use App\Models\Secteur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menage>
 */
class MenageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefix = $this->faker->randomElement(['90', '91', '92', '93', '96', '97', '98', '99', '70', '71', '72', '73', '76', '77', '78', '79']);
        $phoneNumber = $prefix . $this->faker->numerify('######');

        return [
            'code' => $this->faker->unique()->numberBetween(0, 1000), // Vous pouvez personnaliser la génération de code
            'personne_a_contacter' => $phoneNumber,
            'date_abonnement' => $this->faker->date(),
            'date_prise_effet' => $this->faker->date(),
            'user_id' => User::factory(), // Utilisation de la factory User pour attribuer un utilisateur au ménage
            'secteur_id' => Secteur::factory(), // Utilisation de la factory Secteur pour attribuer un secteur au ménage
        ];
    }
}
