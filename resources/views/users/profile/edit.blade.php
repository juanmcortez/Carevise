@extends('layouts.application')

@section('page-title', __(':userdata profile details', ['userdata' => $user->demographic->complete_name]))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <div class="user-profile">
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
                <x-forms.select name="demographic[title]" :label="__('Title')" :items="\App\Enums\Title::options()" :value="old('demographic.title', $user->demographic->title)"
                    :error="$errors" />
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
                <x-forms.select name="demographic[gender]" :label="__('Gender')" :items="\App\Enums\Gender::options()" :value="old('demographic.gender', $user->demographic->gender)"
                    :error="$errors" required />
            </div>

            <div class="card-holder double">
                <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-dark text-light">
                    {{ __('Update') }}
                </button>
            </div>
        </form>

        @if (auth()->user()->username == $user->username && auth()->user()->id == $user->id)
            <div>
                <form method="POST" action="{{ route('users.profile.password.update') }}">
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

                <form method="POST" action="{{ route('users.profile.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <div class="pb-6 card-holder double !bg-danger/15 !border-danger/5">
                        {{ __('Are you sure you want to delete your account?') }}<br /><br />{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}<br /><br />
                        {{ __('Before deleting your account, please download any data or information that you wish to retain.') }}
                    </div>
                    <div class="card-holder double !bg-danger/15 !border-danger/5">
                        <x-forms.input name="user_current_password" :label="__('Current password')" :error="$errors" required />
                    </div>
                    <div class="card-holder double !bg-danger/15 !border-danger/5">
                        <button id="submit" class="w-full px-4 py-3 mb-6 rounded bg-danger text-light">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
