<?php

namespace App\Http\Requests\Commons;

use App\Enums\Countries;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
        return [
            'street'            => ['nullable', 'string', 'max:128'],
            'street_extended'   => ['nullable', 'string', 'max:128'],
            'city'              => ['nullable', 'string', 'max:64'],
            'state'             => ['nullable', 'string', 'max:4'],
            'postal_code'       => ['nullable', 'string', 'max:16'],
            'country'           => ['nullable', 'string', 'max:3', Rule::enum(Countries::class)],
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'street'            => 'Main address',
            'street_extended'   => 'Extended address',
            'city'              => 'City',
            'state'             => 'State',
            'postal_code'       => 'Postal code',
            'country'           => 'Country',
        ];
    }
}
