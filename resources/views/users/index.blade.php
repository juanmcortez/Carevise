@extends('layouts.application')

@section('page-title', __('Users list'))

@section('submenu')
    <x-tools.submenu :items="$submenu" />
@endsection

@section('content')
    <table id="table">
        <thead>
            <tr>
                <th class="w-3/12">
                    <span>{{ __('Name') }}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg>
                    </span>
                </th>
                <th class="w-3/12">
                    <span>{{ __('E-mail') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg>
                    </span>
                </th>
                <th class="w-3/12">
                    <span>{{ __('Username') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg>
                    </span>
                </th>
                <th class="w-2/12">
                    <span>{{ __('Birthdate') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg>
                    </span>
                </th>
                <th class="w-1/12">
                    <span>{{ __('Age') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                            <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                            <rect width="32" height="32" fill="none"></rect>
                        </svg>
                    </span>
                </th>
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
        <tfoot>
            <tr>
                <td colspan="5">{{ $users->links() }}</td>
            </tr>
        </tfoot>
    </table>
@endsection
