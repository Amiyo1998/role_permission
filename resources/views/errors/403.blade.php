@extends('errors.errors_layouts')
@section('error_title')
    403 - Access denied
@endsection
@section('errors_content')
    <h2>403</h2>
    <p>Access denied</p>
    <p class="mt-2">
        {{ $exception->getMessage() }}
    </p>
    <a href="{{ route('admin.dashboard')}}">Back to Dashboard</a>
    <a href="{{ route('admin.login')}}">Login again</a>
@endsection
