@extends('backend.layouts.master')
@section('title')

@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
 <!-- page title area start -->
 <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admin Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{ route('admins.index')}}">All Admins</a></li>
                    <li><span>Create Admin</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials._logout')
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create new admin</h4>
                    @include('backend.layouts.partials._messages')
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">{{ session('message') }}</div>
                    @endif
                    <div class="data-tables">
                        <form action="{{ route('admins.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name" class="col-form-label">Admin Name</label>
                                    <input class="form-control" type="text"  id="name" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email" class="col-form-label">Admin Email</label>
                                    <input class="form-control" type="email"  id="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input class="form-control" type="password"  id="password" name="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                    <input class="form-control" type="password"  id="password_confirmation" name="password_confirmation" placeholder="Enter Confrim Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="col-form-label">Assign Roles</label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input class="form-control" type="username"  id="username" name="username" placeholder="Enter username">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection


