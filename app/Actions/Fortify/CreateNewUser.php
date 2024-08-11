<?php

namespace App\Actions\Fortify;

use App\Models\Users\User;
use Illuminate\Validation\Rule;
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
            'email'             => ['nullable', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password'          => $this->passwordRules(),
            'email_verified_at' => ['nullable'],
        ])->validate();

        return User::create([
            'username'  => $input['username'],
            'email'     => $input['email'],
            'password'  => Hash::make($input['password']),
        ]);
    }
}
