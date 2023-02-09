@extends('errors.errors_layouts')
@section('error_title')
    500 - Internal Server Error!
@endsection
@section('errors_content')
    <h2>500</h2>
    <p>Internal Server Error!</p>
    <p class="mt-2">
        {{ $exception->getMessage() }}
    </p>
    <a href="{{ route('admin.dashboard')}}">Back to Dashboard</a>
    <a href="{{ route('admin.login')}}">Login again</a>
@endsection
