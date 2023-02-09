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
                <h4 class="page-title pull-left">Blog Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{ route('users.index')}}">All BLogs</a></li>
                    <li><span>Edit Blog</span></li>
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
                    <h4 class="header-title">Edit Blog</h4>
                    @include('backend.layouts.partials._messages')
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">{{ session('message') }}</div>
                    @endif
                    <div class="data-tables">
                        <form action="{{ route('blogs.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name" class="col-form-label">Title Name</label>
                                    <input class="form-control" type="text"  id="name" name="name" placeholder="Enter title name" value="{{  $blog->name }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Enter description" >{{  $blog->description}}</textarea>
                                </div>
                            </div><div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="image" class="col-form-label">Image</label>

                                        <img src="{{ asset('storage/'.$blog->image) }}" alt="" width="180px" height="100px">

                                        <input class="form-control" type="file"  id="image" name="image" placeholder="Enter image">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save </button>
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


