@extends('layouts.application')

@section('content')
    <div class="flex flex-row w-9/12 text-gray-800 shadow sm:w-6/12 md:w-4/12 xl:w-5/12">
        <div class="flex flex-col w-full xl:w-7/12 h-auto xl:min-h-[60vh] bg-gray-200 items-center justify-center p-4">
            <h1 class="text-lg font-extrabold uppercase xl:text-3xl">{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full px-0 mt-4 xl:mt-8 xl:px-8">
                @csrf
                <x-form-input name="username" :value="old('username')" :error="$errors->get('username')" :placeholder="__('Username')" autofocus />

                <x-form-input name="password" type="password" :error="$errors->get('password')" :placeholder="__('Password')" />

                <div class="flex flex-col items-center justify-between mb-4 xl:mb-5 sm:flex-row">
                    <div class="flex items-center sm:justify-center mb-1.5 sm:mb-0">
                        <x-checkbox id="remember_me" name="remember_me" value="1">{{ __('Remember me') }}</x-checkbox>
                    </div>
                    <div class="text-sm leading-5">
                        <x-link route="{{ route('password.request') }}">{{ __('Forgot your password?') }}</x-link>
                    </div>
                </div>

                <x-button
                    class="tracking-wider text-teal-100 uppercase bg-teal-600 border-teal-200 hover:bg-teal-500/75 hover:text-teal-900 focus:border-teal-400 focus:bg-teal-500/50 xl:mb-6"
                    type="submit">
                    {{ __('Login') }}
                </x-button>

                <x-link class="w-auto mx-auto mt-4 xl:mt-0" route="{{ route('register') }}">
                    {{ __('New to the system? create an account!') }}
                </x-link>

            </form>
        </div>
        <div class="hidden xl:flex w-5/12 min-h-[60vh] overflow-hidden bg-gray-200/50">
            &nbsp;
        </div>
    </div>
@endsection
