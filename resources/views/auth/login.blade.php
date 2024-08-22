@extends('layouts.application')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center justify-center min-h-full">
        @csrf
        @if (session('status'))
            <div
                class="inline-flex items-center justify-center w-1/5 h-auto p-4 mb-6 text-xs text-light bg-info/70 border-y border-light">
                <box-icon class="w-5 h-5 mr-1 fill-light" type='solid' name='info-circle'></box-icon>
                {{ session('status') }}
            </div>
        @endif
        <div class="!w-1/5 !mb-0 card-holder">
            <div class="flex flex-col w-full pb-6">
                <x-forms.input name="username" :label="__('Username')" :value="old('username')" :error="$errors" focus required nolbl />
                <x-forms.input name="password" :label="__('Password')" :value="old('password')" :error="$errors" required nolbl />

                <x-forms.checkbox name="remember_me" :label="__('Remember Me')" :error="$errors" />

                <button id="submit" class="w-full px-4 py-3 rounded bg-dark text-light">
                    {{ __('Login') }}
                </button>

                <span class="flex flex-row items-center justify-between w-full mt-6">
                    <x-link :route="route('password.request')" class="text-xs text-accent">{{ __('Forgot your password?') }}</x-link>
                    <x-link :route="route('register')" class="text-xs text-accent">{{ __('Create your account!') }}</x-link>
                </span>
            </div>
        </div>
    </form>
@endsection
