<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('page-title')
            {{ config('company.short-name', config('company.name', 'Carevise')) }} | @yield('page-title')
        @else
            {{ config('company.short-name', config('company.name', 'Carevise')) }}
        @endif
    </title>
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

<body @Auth id="carevise" @else id="guest" @endAuth>
    @Auth
        @include('layouts.partials.sidebar')
    @endAuth
    <main>
        @Auth
            @hasSection('submenu')
                @yield('submenu')
            @endif
        @endAuth
        <section class="content">
            @include('layouts.partials.header')
            @Auth
                @include('layouts.partials.breadcrumb')
            @endAuth
            <article>
                @yield('content')
            </article>
            @include('layouts.partials.footer')
        </section>
    </main>
</body>

</html>
