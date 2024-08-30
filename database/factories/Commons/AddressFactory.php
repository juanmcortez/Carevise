<?php

namespace Database\Factories\Commons;

use App\Enums\Countries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commons\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street'            => fake()->streetAddress(),
            'street_extended'   => (fake()->boolean()) ? fake()->streetSuffix() : null,
            'city'              => fake()->city(),
            'state'             => fake()->toUpper(fake()->randomLetter() . fake()->randomLetter()),
            'postal_code'       => fake()->randomNumber(5, true),
            'country'           => fake()->randomElement(Countries::cases()),
        ];
    }


    /**
     * Define the empty values for the factory
     *
     * @return void
     */
    public function emptyValues()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'street'            => null,
                    'street_extended'   => null,
                    'city'              => null,
                    'state'             => null,
                    'postal_code'       => null,
                    'country'           => null,
                ];
            }
        );
    }
}
