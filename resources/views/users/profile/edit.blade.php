@extends('layouts.application')

@section('content')
    USER PROFILE
    <form method="POST" action="{{ route('user.profile.update', ['user' => $user]) }}">
        @csrf
        @method('PATCH')
        <div class="flex flex-row space-x-4">
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-input name="username" :value="old('username', $user->username)" :error="$errors->get('username')" :placeholder="__('Username')" readonly />
                <x-form-input name="email" :value="old('email', $user->email)" :error="$errors->get('email')" :placeholder="__('E-mail')" maxlength="255" />
            </div>
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-checkbox class="mr-4" name="is_active" value="1" :checked="old('is_active', $user->is_active)" :error="$errors->get('is_active')" readonly
                    disabled>{{ __('Is the user active?') }}</x-form-checkbox>
                <x-form-checkbox name="is_user_provider" value="1" :checked="old('is_user_provider', $user->is_user_provider)"
                    :error="$errors->get('is_user_provider')">{{ __('Is the user a provider?') }}</x-form-checkbox>
            </div>
        </div>
        <div class="flex flex-row space-x-4">
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-input name="demographic[title]" :value="old('demographic.title', $user->demographic->title)" :error="$errors->get('demographic.title')" :placeholder="__('Title')"
                    maxlength="12" />
                <x-form-input name="demographic[last_name]" :value="old('demographic.last_name', $user->demographic->last_name)" :error="$errors->get('demographic.last_name')" :placeholder="__('Last name')" />
            </div>
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-input name="demographic[first_name]" :value="old('demographic.first_name', $user->demographic->first_name)" :error="$errors->get('demographic.first_name')" :placeholder="__('First name')" />
                <x-form-input name="demographic[middle_name]" :value="old('demographic.middle_name', $user->demographic->middle_name)" :error="$errors->get('demographic.middle_name')" :placeholder="__('Middle name')" />
            </div>
        </div>
        <div class="flex flex-row space-x-4">
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-input name="demographic[date_of_birth]" :value="old('demographic.date_of_birth', $user->demographic->date_of_birth->format('M d, Y'))" :error="$errors->get('demographic.date_of_birth')" :placeholder="__('Birthdate')" />
                <x-form-input name="demographic[gender]" :value="old('demographic.gender', $user->demographic->gender)" :error="$errors->get('demographic.gender')" :placeholder="__('Gender')" />
            </div>
            <div class="flex flex-row w-1/2 mb-12 space-x-2">
                <x-form-input name="npi" :value="old('npi', $user->npi)" :error="$errors->get('npi')" :placeholder="__('NPI')" maxlength="16" />
            </div>
        </div>
        <x-button
            class="text-teal-100 uppercase bg-teal-600 border-teal-200 xl:w-32 hover:bg-teal-500/75 hover:text-teal-900 focus:border-teal-400 focus:bg-teal-500/50"
            type="submit">
            {{ __('Update') }}
        </x-button>
    </form>
@endsection
