@extends('layouts.application')

@section('page-title', __('Disabled providers list'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <x-tools.simple-table class="provider-list inactive" :colwd="['w-4/12', 'w-4/12', 'w-1/12', 'w-2/12', 'w-1/12']" :colbl="['Name', 'E-mail', 'Username', 'Birthdate', 'NPI']" :coldt="$inactive->links()">
        @if ($inactive->isEmpty())
            <tr>
                <td colspan="5" class="empty">{{ _('There are no inactive providers to display') }}</td>
            </tr>
        @else
            @foreach ($inactive as $provider)
                <tr x-data
                    x-on:click="window.location.href='{{ route('providers.profile', ['provider' => $provider->username]) }}'">
                    <td>{{ $provider->demographic->complete_name }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->username }}</td>
                    <td>{{ $provider->demographic->date_of_birth->format('M d, Y') }}</td>
                    <td>{{ $provider->npi }}</td>
                </tr>
            @endforeach
        @endif
    </x-tools.simple-table>
@endsection
