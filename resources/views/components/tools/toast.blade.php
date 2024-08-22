@props([
    'type' => 'info',
    'help' => false,
    'success' => false,
    'errors' => false,
    'warning' => false,
    'info' => false,
])
@php
    if ($help) {
        $type = 'help';
    } elseif ($success) {
        $type = 'success';
    } elseif ($errors->any()) {
        $type = 'error';
    } elseif ($warning) {
        $type = 'warning';
    } elseif ($info) {
        $type = 'info';
    }
@endphp
@if ($help || $success || $info || $errors->any() || $warning)
    <div {{ $attributes->merge(['class' => 'toast ' . $type]) }} role="alert" tabindex="-1" x-data="{ isOpen: false }"
        x-cloak x-show="isOpen" x-init="$nextTick(() => { isOpen = !isOpen });
        setTimeout(() => isOpen = !isOpen, 4000);" x-transition.duration.400ms>
        <h6>{{ __($type) }}</h6>
        <div class="message">
            @if ($info)
                <span>{!! $info !!}</span>
            @elseif ($help == 'verification-link-sent')
                <span>{!! __(
                    'A new <strong>verification link</strong> has been sent to the <strong>email address</strong> you provided during registration.',
                ) !!}</span>
            @elseif ($help)
                <span>{!! $help !!}</span>
            @elseif ($errors->any())
                @foreach ($errors->all() as $message)
                    <span>{!! $message !!}</span>
                @endforeach
            @elseif ($success)
                <span>{!! $success !!}</span>
            @elseif ($warning)
                <span>{!! $warning !!}</span>
            @endif
        </div>
    </div>
@endif
