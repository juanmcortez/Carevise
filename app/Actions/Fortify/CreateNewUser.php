<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\Users\User;
use App\Models\Commons\Address;
use Illuminate\Validation\Rule;
use App\Models\Commons\Demographic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username'          => ['required', 'string', 'max:64', Rule::unique(User::class),],
            'email'             => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password'          => $this->passwordRules(),
            'email_verified_at' => ['nullable'],
        ])->validate();

        $demographic = Demographic::factory()->create([
            'title'         => null,
            'first_name'    => null,
            'middle_name'   => null,
            'last_name'     => null,
            'date_of_birth' => Carbon::now()->format('Y-m-d'),
            'gender'        => null,
            'address_id'    => Address::factory()->emptyValues()->create(),
        ]);

        return User::create([
            'username'              => $input['username'],
            'email'                 => $input['email'],
            'password'              => Hash::make($input['password']),
            'is_active'             => true,
            'is_user_provider'      => false,
            'specialty'             => null,
            'npi'                   => null,
            'federal_tax_id'        => null,
            'taxonomy'              => null,
            'aditional_information' => null,
            'demographic_id'        => $demographic->id,
        ]);
    }
}
