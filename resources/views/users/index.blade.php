@extends('layouts.application')

@section('page-title', __('Users list'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <table id="table">
        <thead>
            <tr>
                <th class="w-3/12 !text-left">{{ __('Name') }}</th>
                <th class="w-3/12">{{ __('E-mail') }}</th>
                <th class="w-3/12">{{ __('Username') }}</th>
                <th class="w-2/12">{{ __('Birthdate') }}</th>
                <th class="w-1/12">{{ __('Age') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr x-data x-on:click="window.location.href = '{{ route('users.profile', ['user' => $user->username]) }}'">
                    <td class="!text-left">{{ $user->demographic->complete_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->demographic->date_of_birth->format('M d, Y') }}</td>
                    <td>{{ $user->demographic->age }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
