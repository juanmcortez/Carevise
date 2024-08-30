@extends('layouts.application')

@section('page-title', __('Create a new provider'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <div class="provider-profile">
        <form method="POST" action="{{ route('providers.create') }}">
            @csrf
            <div class="card-holder double">
                <x-forms.input name="username" :label="__('Provider username')" :value="old('username')" :error="$errors" focus required />
                <x-forms.input name="email" :label="__('E-mail')" :value="old('email')" :error="$errors" required />
            </div>

            <div class="card-holder double">
                <x-forms.input name="password" :label="__('Password')" :error="$errors" required />
                <x-forms.input name="password_confirmation" :label="__('Confirm password')" :error="$errors" required />
            </div>

            <div class="card-holder double">
                <x-forms.input name="npi" :label="__('NPI')" :value="old('npi')" :error="$errors" required />
                <x-forms.select name="specialty" :label="__('Specialty')" :items="\App\Enums\SpecialistType::options()" :value="old('specialty')"
                    :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="federal_tax_id" :label="__('Federal Tax ID')" :value="old('federal_tax_id')" :error="$errors" />
                <x-forms.input name="taxonomy" :label="__('Taxonomy')" :value="old('taxonomy')" :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.select name="demographic[title]" :label="__('Title')" :items="\App\Enums\Title::options()" :value="old('demographic.title')"
                    :error="$errors" class="!w-1/3" />
                <x-forms.input name="demographic[last_name]" :label="__('Last name')" :value="old('demographic.last_name')" :error="$errors"
                    required />
                <x-forms.input name="demographic[first_name]" :label="__('First name')" :value="old('demographic.first_name')" :error="$errors"
                    required />
                <x-forms.input name="demographic[middle_name]" :label="__('Middle name')" :value="old('demographic.middle_name')" :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="demographic[date_of_birth]" :label="__('Birthdate')" :value="old('demographic.date_of_birth')" :error="$errors"
                    required />
                <x-forms.select name="demographic[gender]" :label="__('Gender')" :items="\App\Enums\Gender::options()" :value="old('demographic.gender')"
                    :error="$errors" required />
            </div>

            <div class="card-holder double">
                <x-forms.input name="demographic[address][street]" :label="__('Main address')" :value="old('demographic.address.street')"
                    :error="$errors" />
                <x-forms.input name="demographic[address][street_extended]" :label="__('Extended address')" :value="old('demographic.address.street_extended')"
                    :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="demographic[address][city]" :label="__('City')" :value="old('demographic.address.city')" :error="$errors" />
                <x-forms.input name="demographic[address][state]" :label="__('State')" :value="old('demographic.address.state')"
                    :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="demographic[address][postal_code]" :label="__('Postal code')" :value="old('demographic.address.postal_code')"
                    :error="$errors" />
                <x-forms.select name="demographic[address][country]" :label="__('Country')" :items="\App\Enums\Countries::options()"
                    :value="old('demographic.address.country')" :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.textarea name="aditional_information" :label="__('Aditional information')" :value="old('aditional_information')" :error="$errors" />
            </div>

            <div class="card-holder double">
                <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
@endsection
