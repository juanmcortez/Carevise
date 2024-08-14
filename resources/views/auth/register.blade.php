@extends('layouts.application')

@section('content')
    <div class="flex flex-row w-9/12 text-gray-800 shadow sm:w-6/12 md:w-4/12 xl:w-5/12">
        <div class="flex flex-col w-full xl:w-7/12 h-auto xl:min-h-[60vh] bg-gray-200 items-center justify-center p-4">
            <h1 class="text-lg font-extrabold uppercase xl:text-3xl">{{ __('Register') }}</h1>
            <form method="POST" action="{{ route('register') }}" class="flex flex-col w-full px-0 mt-4 xl:mt-8 xl:px-8">
                @csrf
                <x-form-input name="username" :value="old('username')" :error="$errors->get('username')" :placeholder="__('Username')" autofocus />

                <x-form-input name="email" :value="old('email')" :error="$errors->get('email')" :placeholder="__('E-mail')" />

                <x-form-input name="password" type="password" :error="$errors->get('password')" :placeholder="__('Password')" />

                <x-form-input name="password_confirmation" type="password" :error="$errors->get('password_confirmation')" :placeholder="__('Confirm password')" />

                <x-button
                    class="tracking-wider text-teal-100 uppercase bg-teal-600 border-teal-200 hover:bg-teal-500/75 hover:text-teal-900 focus:border-teal-400 focus:bg-teal-500/50 xl:mb-6"
                    type="submit">
                    {{ __('Create account') }}
                </x-button>

                <div class="flex flex-col items-center justify-between w-full xl:flex-row">
                    <x-link class="mt-4 xl:mt-0" route="{{ route('login') }}">
                        {{ __('Login to your account') }}
                    </x-link>
                    <x-link class="mt-2 xl:mt-0" route="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-link>
                </div>

            </form>
        </div>
        <div class="hidden xl:flex w-5/12 min-h-[60vh] overflow-hidden bg-gray-200/50">
            &nbsp;
        </div>
    </div>
@endsection
