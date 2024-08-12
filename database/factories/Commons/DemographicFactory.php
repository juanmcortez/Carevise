<?php

namespace Database\Factories\Commons;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commons\Demographic>
 */
class DemographicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rndGdr = fake()->randomElement(['male', 'female']);
        return [
            'title'         => '',
            'first_name'    => fake()->firstName($rndGdr),
            'middle_name'   => (fake()->boolean()) ? fake()->firstName($rndGdr) : null,
            'last_name'     => fake()->lastName(),
            'date_of_birth' => fake()->dateTimeBetween('-95 Years', '-6 Months'),
            'gender'        => $rndGdr,
            // 'address_id'    => (fake()->boolean()) ? Address::factory()->create() : Address::factory()->emptyValues()->create(),
            // 'phone_id'      => (fake()->boolean()) ? Phone::factory()->create() : Phone::factory()->emptyValues()->create(),
            // 'cellphone_id'  => (fake()->boolean()) ? Phone::factory()->create() : Phone::factory()->emptyValues()->create(),
            // 'email_id'      => (fake()->boolean()) ? Email::factory()->create() : Email::factory()->emptyValues()->create(),
        ];
    }
}
