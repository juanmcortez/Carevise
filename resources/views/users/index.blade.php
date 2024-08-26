@extends('layouts.application')

@section('page-title', __('Users list'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <x-tools.simple-table class="user-list" :colwd="['w-3/12', 'w-3/12', 'w-3/12', 'w-2/12', 'w-1/12']" :colbl="['Name', 'E-mail', 'Username', 'Birthdate', 'Age']">
        @foreach ($users as $user)
            <tr x-data x-on:click="window.location.href='{{ route('users.profile', ['user' => $user->username]) }}'">
                <td>{{ $user->demographic->complete_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->demographic->date_of_birth->format('M d, Y') }}</td>
                <td>{{ $user->demographic->age }}</td>
            </tr>
        @endforeach
    </x-tools.simple-table>
@endsection
