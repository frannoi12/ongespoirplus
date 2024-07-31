<?php

namespace Database\Factories;

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
        return [
            'code' => $this->faker->unique()->numberBetween(0,1000), // Vous pouvez personnaliser la génération de code
            'personne_a_contacter' => $this->faker->name,
            'date_abonnement' => $this->faker->date,
            'date_prise_effet' => $this->faker->date,
            'user_id' => User::factory(), // Utilisation de la factory User pour attribuer un utilisateur au ménage
            'secteur_id' => 1, // Utilisation de la factory Secteur pour attribuer un secteur au ménage
        ];
    }
}
