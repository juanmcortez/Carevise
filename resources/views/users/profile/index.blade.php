@extends('layouts.application')

@section('content')
    USER PROFILE
    <br />
    <br />
    <pre>{{ $user }}</pre>
    <br />
    <pre>{{ $user->demographic }}</pre>
@endsection
