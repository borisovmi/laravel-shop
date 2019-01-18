@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">My personal area</h1>
</div>
<div class="row">
    <!-- Sidebar -->
    <div class="col-2 d-none d-sm-block rounded bg-success">        
        <ul class="sidebar navbar-nav">
            <li class="nav-item active ">
                <a class="nav-link text-white" href="{{url('user/'.session('user_id'))}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span class="d-none d-sm-block d-lg-inline">Home</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="{{url('user/'.session('user_id').'/orders')}}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span class="d-none d-sm-block d-lg-inline">Orders</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="{{url('user/'.session('user_id').'/profile')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span class="d-none d-sm-block d-lg-inline">Personal Details</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="{{url('user/'.session('user_id').'/messages')}}">
                    <i class="fas fa-fw fa-comment-alt"></i>
                    <span class="d-none d-sm-block d-lg-inline">Messages</span></a>
            </li>
        </ul>
    </div>
    <!-- Sidebar moved to center-->
    <div class="d-inline d-sm-none col-12 p-2 mb-3 bg-success rounded sticky-top">
        <div class="text-center" style="font-size: 1.5em">
            <a class="p-2 text-white" href="{{url('user/'.session('user_id'))}}"><i class="fas fa-fw fa-home"></i></a>
            <a class="p-2 text-white" href="{{url('user/'.session('user_id').'/orders')}}"><i class="fas fa-fw fa-shopping-cart"></i></a>
            <a class="p-2 text-white" href="{{url('user/'.session('user_id').'/profile')}}"><i class="fas fa-fw fa-user"></i></a>
            <a class="p-2 text-white" href="{{url('user/'.session('user_id').'/messages')}}"><i class="fas fa-fw fa-comment-alt"></i></a>            
        </div>
    </div>

    <div id="" class="col-12  col-sm-10">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('user/'.session('user_id'))}}">{{session('user_name')}}</a>
                </li>
                <li class="breadcrumb-item active">{{$inner_title}}</li>
            </ol>
            <!-- End Breadcrumbs-->
            <div class="row">
                @yield('usercontent')
            </div>
        </div>
    </div>
</div>


@endsection
