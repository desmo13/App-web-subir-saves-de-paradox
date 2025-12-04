<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GameName;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'public'      => $this->faker->boolean(),
            'number_of_downloads' => $this->faker->numberBetween(0, 100),
            'favorite'    => $this->faker->numberBetween(0, 1000),
            'file_name'   => Str::random(10) . '.' . $this->faker->fileExtension(),
            'path'        =>Str::random(10) . '.' . $this->faker->fileExtension(),
            'user_id'     => 1, // cada game se asocia a un User generado
            'game_name_id'=> GameName::factory(),
        ];
    }
}
