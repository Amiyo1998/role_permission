@extends('errors.errors_layouts')
@section('error_title')
    404 - Page not found
@endsection
@section('errors_content')
    <h2>404</h2>
    <p>Sorry!! Page not found</p>
    <p class="mt-2">
        {{ $exception->getMessage() }}
    </p>
    <a href="{{ route('admin.dashboard')}}">Back to Dashboard</a>
    <a href="{{ route('admin.login')}}">Login again</a>
@endsection
