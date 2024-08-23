@extends('layouts.application')

@section('page-title', __(':userdata profile details', ['userdata' => $user->demographic->complete_name]))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <form method="POST" action="{{ route('users.profile.update', ['user' => $user]) }}">
        @csrf
        @method('PATCH')

        <x-forms.input type="hidden" name="username" value="{{ $user->username }}" />

        <div class="card-holder double">
            <x-forms.input name="userdata" :label="__('Username')" :value="old('userdata', $user->username)" :error="$errors" disabled readonly
                required />

            <x-forms.checkbox name="is_active" :label="__('Is the user active?')" :checked="old('is_active', $user->is_active)" :error="$errors" />
            <x-forms.input name="email" :label="__('E-mail')" :value="old('email', $user->email)" :error="$errors" focus required />
        </div>

        <div class="card-holder double">
            <x-forms.input name="demographic[title]" :label="__('Title')" :value="old('demographic.title', $user->demographic->title)" :error="$errors" />
            <x-forms.checkbox name="is_user_provider" :label="__('Is the user a provider?')" :checked="old('is_user_provider', $user->is_user_provider)" :error="$errors" />
            <x-forms.input name="npi" :label="__('NPI')" :value="old('npi', $user->npi)" :error="$errors" />
        </div>

        <div class="card-holder double">
            <x-forms.input name="demographic[last_name]" :label="__('Last name')" :value="old('demographic.last_name', $user->demographic->last_name)" :error="$errors"
                required />
            <x-forms.input name="demographic[first_name]" :label="__('First name')" :value="old('demographic.first_name', $user->demographic->first_name)" :error="$errors"
                required />
            <x-forms.input name="demographic[middle_name]" :label="__('Middle name')" :value="old('demographic.middle_name', $user->demographic->middle_name)" :error="$errors" />
        </div>

        <div class="card-holder double">
            <x-forms.input name="demographic[date_of_birth]" :label="__('Birthdate')" :value="old('demographic.date_of_birth', $user->demographic->date_of_birth->format('M d, Y'))" :error="$errors"
                required />
            <x-forms.input name="demographic[gender]" :label="__('Gender')" :value="old('demographic.gender', $user->demographic->gender)" :error="$errors" />
        </div>

        <div class="card-holder double">
            <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                {{ __('Update') }}
            </button>
        </div>
    </form>
@endsection
