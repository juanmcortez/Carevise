<?php

namespace App\Http\Requests\Fortify;

use Laravel\Fortify\Fortify;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginUserRequest extends LoginRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            Fortify::username() => ['required', 'string', 'max:64'],
            'password'          => Password::defaults(),
        ];
    }
}
