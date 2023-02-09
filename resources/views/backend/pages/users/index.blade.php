@extends('backend.layouts.master')
@section('title')

@endsection

@section('style')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('content')
 <!-- page title area start -->
 <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">User</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li><span>All Users</span></li>
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
                    <h4 class="header-title">User List</h4>
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">{{ session('message') }}</div>
                    @endif
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('users.create') }}">Create New User</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table  class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="15%">Name</th>
                                    <th width="30%">Email</th>
                                    <th width="30%">Roles</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        <span class="badge badge-primary">
                                            {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('users.edit', $user->id)}}">Edit</a>
                                        <a class="btn btn-danger text-white" href="{{ route('users.destroy', $user->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">Delete</a>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection
@section('script')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
        /*================================
    datatable active
    ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
</script>
@endsection
