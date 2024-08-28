<?php

namespace Database\Factories\Users;

use Illuminate\Support\Str;
use App\Models\Commons\Demographic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\Provider>
 */
class ProviderFactory extends Factory
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
            'username'              => fake()->userName(),
            'email'                 => fake()->unique()->safeEmail(),
            'email_verified_at'     => now(),
            'password'              => static::$password ??= Hash::make('password'),
            'is_user_provider'      => true,
            'specialty'             => null,
            'npi'                   => fake()->randomNumber(8, true),
            'federal_tax_id'        => null,
            'taxonomy'              => null,
            'aditional_information' => null,
            'remember_token'        => Str::random(10),
            'demographic_id'        => Demographic::factory()->create()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
