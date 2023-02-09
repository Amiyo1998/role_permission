@extends('backend.layouts.master')
@section('title')

@endsection
@section('content')
 <!-- page title area start -->
 <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><span>Dashboard</span></li>
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
        <!-- seo fact area start -->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-6 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <a href="{{ route('admins.index')}}">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-user"></i> Admins</div>
                                    <h2>{{ $total_admins}}</h2>
                                </div>
                            </a>
                            <canvas id="seolinechart1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <a href="{{ route('roles.index')}}">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-users"></i> Roles</div>
                                    <h2>{{ $total_roles}}</h2>
                                </div>
                            </a>
                            <canvas id="seolinechart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="seo-fact sbg4">
                            <a href="{{ route('blogs.index')}}">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-users"></i> Blogs</div>
                                    <h2>{{ $total_blogs}}</h2>
                                </div>
                            </a>
                            <canvas id="seolinechart4" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Permissions</div>
                                    <h2>{{ $total_permissions}}</h2>
                                </div>
                            <canvas id="seolinechart3" height="50"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- seo fact area end -->
        <!-- Social Campain area start -->
        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="header-title">Social ads Campain</h4>
                    <div id="socialads" style="height: 245px;"></div>
                </div>
            </div>
        </div>
        <!-- Social Campain area end -->
        <!-- Statistics area start -->
        <div class="col-lg-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">User Statistics</h4>
                    <div id="user-statistics"></div>
                </div>
            </div>
        </div>
        <!-- Statistics area end -->
        <!-- Advertising area start -->
        <div class="col-lg-4 mt-5">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="header-title">Advertising & Marketing</h4>
                    <canvas id="seolinechart8" height="233"></canvas>
                </div>
            </div>
        </div>
        <!-- Advertising area end -->
    </div>
</div>
@endsection
