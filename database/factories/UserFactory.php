<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'token' => Str::random(10),
            'weekly_budget' => 35,
            'start_weight' => null,
            'target_weight' => null,
            'height' => null,
            'setup_complete' => false,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function papa(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Papa',
            'token' => 'papa',
        ]);
    }
}
