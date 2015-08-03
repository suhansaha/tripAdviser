@extends('layout')

@section('content')
<div class="col-md-2" style="position:fixed;padding:0px;background-color: #333333;height:100%">
    <ul class="sidebar navbar-fix">
        <li class="sidebar-menu glyphicon glyphicon-home"> Dashboard</li>
        <li class="sidebar-menu sidebar-active glyphicon glyphicon-briefcase"> Products</li>
        <li class="sidebar-menu glyphicon glyphicon-user"> Users</li>
        <li class="sidebar-menu glyphicon glyphicon-shopping-cart"> Orders</li>
        <li class="sidebar-menu glyphicon glyphicon-list-alt"> Categories</li>
        <li class="sidebar-menu glyphicon glyphicon-leaf"> Languages</li>
        <li class="sidebar-menu glyphicon glyphicon-camera"> Images</li>
    </ul>
    @yield('sidebar')
</div>

<div class="container-fluid">
    <div class="col-md-offset-2 col-md-10 navbar-fix">
        @yield('body')
    </div>
</div>
@stop