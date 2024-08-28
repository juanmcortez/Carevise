<?php

namespace App\Http\Requests\Users;

use App\Models\Users\Provider;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Commons\StoreDemographicRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Prepare the "active" checkbox status for validation
        $this->merge([
            'is_active'         => true,
            'is_user_provider'  => true,
        ]);
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
                'username'              => ['bail', 'required', 'string', 'max:64', Rule::unique(provider::class, 'username')],
                'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(provider::class, 'username')],
                'password'              => ['required', 'string', Password::defaults(), 'confirmed'],
                'is_active'             => ['boolean'],
                'is_user_provider'      => ['boolean'],
                'specialty'             => ['nullable', 'string', 'max:128'],
                'npi'                   => ['required', 'string', 'min:8', 'max:16'],
                'federal_tax_id'        => ['nullable', 'string', 'min:8', 'max:16'],
                'taxonomy'              => ['nullable', 'string', 'min:8', 'max:16'],
                'aditional_information' => ['nullable', 'string'],
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
                'username'              => 'Username',
                'email'                 => 'E-mail',
                'password'              => 'Password',
                'is_active'             => 'is active option',
                'is_user_provider'      => 'is a provider option',
                'specialty'             => 'Specialty',
                'npi'                   => 'NPI',
                'federal_tax_id'        => 'Federal Tax ID',
                'taxonomy'              => 'Taxonomy',
                'aditional_information' => 'Additional info',
            ],
            $demographics_attributes
        );
    }
}
