@extends('layouts.application')

@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="flex flex-col items-center justify-center min-h-full">
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
                <x-forms.input name="token" type="hidden" :value="request()->route('token')" />

                <x-forms.input name="email" :label="__('E-mail')" :value="old('email')" :error="$errors" required nolbl />

                <x-forms.input name="password" :label="__('Password')" :error="$errors" required nolbl />

                <x-forms.input name="password_confirmation" :label="__('Confirm password')" :error="$errors" required nolbl />

                <button id="submit" class="w-full px-4 py-3 rounded bg-dark text-light">
                    {{ __('Reset password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
