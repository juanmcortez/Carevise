<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('company.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        [x-cloak] {
            display: none
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/Carevise.css', 'resources/js/Carevise.js'])
</head>

<body @guest id="guest" @endguest>
    @Auth
        @include('layouts.partials.sidebar')
    @endAuth
    <div id="content">
        @include('layouts.partials.header')
        <div id="articles">
            <main>
                <div class="wrapper">@yield('content')</div>
                @include('layouts.partials.footer')
            </main>
        </div>
    </div>
</body>

</html>
