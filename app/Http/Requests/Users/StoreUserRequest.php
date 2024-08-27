<?php

namespace App\Http\Requests\Users;

use App\Models\Users\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Commons\StoreDemographicRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // The demographic validation for the user
        $demographics_rules = array();
        foreach ((new StoreDemographicRequest())->rules() as $item => $rule) {
            $demographics_rules['demographic.' . $item] = $rule;
        }

        // Provide the rules for validation
        return array_merge(
            [
                'username'              => ['bail', 'required', 'string', 'max:64', Rule::unique(User::class, 'username')],
                'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class, 'email')],
                'password'              => ['required', 'string', Password::defaults(), 'confirmed'],
            ],
            $demographics_rules
        );
    }


    /**
     * Get the custom validation attributes that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationAttributes|array<mixed>|string>
     */
    public function attributes(): array
    {
        $demographics_attributes = array();
        foreach ((new StoreDemographicRequest())->attributes() as $item => $attribute) {
            $demographics_attributes['demographic.' . $item] = $attribute;
        }

        return array_merge(
            [
                'username'  => 'Username',
                'email'     => 'E-mail',
                'password'  => 'Password',
            ],
            $demographics_attributes
        );
    }
}
