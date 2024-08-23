@extends('layouts.application')

@section('page-title', __('Create a new user'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <form method="POST" action="{{ route('users.create') }}">
        @csrf

        <div class="card-holder double">
            <x-forms.input name="username" :label="__('Username')" :value="old('username')" :error="$errors" focus required />
            <x-forms.input name="email" :label="__('E-mail')" :value="old('email')" :error="$errors" required />
        </div>

        <div class="card-holder double">
            <x-forms.input name="password" :label="__('Password')" :error="$errors" required />
            <x-forms.input name="password_confirmation" :label="__('Confirm password')" :error="$errors" required />
        </div>

        <div class="card-holder double">
            <x-forms.input name="demographic[title]" :label="__('Title')" :value="old('demographic.title')" :error="$errors"
                class="!w-1/3" />
            <x-forms.input name="demographic[last_name]" :label="__('Last name')" :value="old('demographic.last_name')" :error="$errors"
                required />
            <x-forms.input name="demographic[first_name]" :label="__('First name')" :value="old('demographic.first_name')" :error="$errors"
                required />
            <x-forms.input name="demographic[middle_name]" :label="__('Middle name')" :value="old('demographic.middle_name')" :error="$errors" />
        </div>

        <div class="card-holder double">
            <x-forms.input name="demographic[date_of_birth]" :label="__('Birthdate')" :value="old('demographic.date_of_birth')" :error="$errors"
                required />
            <x-forms.input name="demographic[gender]" :label="__('Gender')" :value="old('demographic.gender')" :error="$errors" required />
        </div>

        <div class="card-holder double">
            <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                {{ __('Create') }}
            </button>
        </div>
    </form>
@endsection
