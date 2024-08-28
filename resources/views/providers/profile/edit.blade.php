@extends('layouts.application')

@section('page-title', __('Provider :providerdata details', ['providerdata' => $provider->demographic->complete_name]))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <div class="provider-profile">
        <form method="POST" action="{{ route('providers.profile.update', ['provider' => $provider]) }}">
            @csrf
            @method('PATCH')

            <x-forms.input type="hidden" name="username" value="{{ $provider->username }}" />

            <div class="card-holder double">
                <x-forms.input name="providerdata" :label="__('Username')" :value="old('providerdata', $provider->username)" :error="$errors" disabled readonly
                    required />
                <x-forms.input name="email" :label="__('E-mail')" :value="old('email', $provider->email)" :error="$errors" focus required />
            </div>

            @if (!auth()->user()->is_user_provider)
                <div class="card-holder double">
                    <x-forms.checkbox name="is_active" :label="__('Is the provider active?')" :checked="old('is_active', $provider->is_active)" :error="$errors" />
                    <x-forms.checkbox name="is_user_provider" :label="__('Is a provider?')" :checked="old('is_user_provider', $provider->is_user_provider)" :error="$errors" />
                </div>
            @else
                <x-forms.input type="hidden" name="is_active" value="1" />
                <x-forms.input type="hidden" name="is_user_provider" value="1" />
            @endif

            <div class="card-holder double">
                <x-forms.input name="npi" :label="__('NPI')" :value="old('npi', $provider->npi)" :error="$errors" />
                <x-forms.select name="specialty" :label="__('Specialty')" :items="\App\Enums\SpecialistType::options()" :value="old('specialty', $provider->specialty)"
                    :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="federal_tax_id" :label="__('Federal Tax ID')" :value="old('federal_tax_id', $provider->federal_tax_id)" :error="$errors" />
                <x-forms.input name="taxonomy" :label="__('Taxonomy')" :value="old('taxonomy', $provider->taxonomy)" :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.select name="demographic[title]" :label="__('Title')" :items="\App\Enums\Title::options()" :value="old('demographic.title', $provider->demographic->title)"
                    :error="$errors" class="!w-1/3" />
                <x-forms.input name="demographic[last_name]" :label="__('Last name')" :value="old('demographic.last_name', $provider->demographic->last_name)" :error="$errors"
                    required />
                <x-forms.input name="demographic[first_name]" :label="__('First name')" :value="old('demographic.first_name', $provider->demographic->first_name)" :error="$errors"
                    required />
                <x-forms.input name="demographic[middle_name]" :label="__('Middle name')" :value="old('demographic.middle_name', $provider->demographic->middle_name)" :error="$errors" />
            </div>

            <div class="card-holder double">
                <x-forms.input name="demographic[date_of_birth]" :label="__('Birthdate')" :value="old('demographic.date_of_birth', $provider->demographic->date_of_birth->format('M d, Y'))" :error="$errors"
                    required />
                <x-forms.select name="demographic[gender]" :label="__('Gender')" :items="\App\Enums\Gender::options()" :value="old('demographic.gender', $provider->demographic->gender)"
                    :error="$errors" required />
            </div>

            <div class="card-holder double">
                <x-forms.textarea name="aditional_information" :label="__('Aditional information')" :value="old('aditional_information', $provider->aditional_information)" :error="$errors" />
            </div>

            <div class="card-holder double">
                <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                    {{ __('Update') }}
                </button>
            </div>
        </form>

        <div>
            @if (auth()->user()->username == $provider->username && auth()->user()->id == $provider->id)
                <form method="POST" action="{{ route('providers.profile.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-holder double">
                        <x-forms.input name="current_password" :label="__('Current password')" :error="$errors" required />
                    </div>
                    <div class="card-holder double">
                        <x-forms.input name="password" :label="__('New password')" :error="$errors" required />
                        <x-forms.input name="password_confirmation" :label="__('Confirm password')" :error="$errors" required />
                    </div>
                    <div class="card-holder double">
                        <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                            {{ __('Update password') }}
                        </button>
                    </div>
                </form>
            @endif
            @if (!auth()->user()->is_user_provider)
                <form method="POST" action="{{ route('providers.profile.destroy', ['provider' => $provider]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="pb-6 card-holder double !bg-danger/15 !border-danger/5">
                        {{ __('Are you sure you want to delete this provider?') }}<br /><br />{{ __('Once the provider is deleted, all of its resources and data will be permanently deleted.') }}<br /><br />{{ __('Before deleting the provider, please save any data or information that you wish to retain.') }}
                    </div>
                    <div class="card-holder double !bg-danger/15 !border-danger/5">
                        <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-danger text-light">
                            {{ __('Delete this provider') }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
