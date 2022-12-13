<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck("id")->toArray();
        return [
            'nama' => 'project ' . $this->faker->word(),
            'keterangan' => $this->faker->sentence(3, true),
            'id_user' => $this->faker->randomElement($user)
        ];
    }
}
