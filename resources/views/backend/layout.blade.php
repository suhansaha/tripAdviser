@extends('layout')

@section('content')
<div class="col-md-2" style="position:fixed;padding:0px;background-color: #333333;height:100%">
    <ul class="sidebar navbar-fix">
        <li class="sidebar-menu sidebar-active glyphicon glyphicon-home"> Dashboard</li>
        <li class="sidebar-menu glyphicon glyphicon-briefcase"><a href="/admin/products"> Products</a></li>
        <li class="sidebar-menu glyphicon glyphicon-user"><a href="/admin/user"> Users</a></li>
        <li class="sidebar-menu glyphicon glyphicon-list-alt"><a href="/admin/roles"> Roles</a></li>
        <li class="sidebar-menu glyphicon glyphicon-shopping-cart"> Orders</li>
        <li class="sidebar-menu glyphicon glyphicon glyphicon-map-marker"><a href="/admin/cities"> Cities</a></li>
        <li class="sidebar-menu glyphicon glyphicon-book"><a href="/admin/categories"> Categories</a></li>
        <li class="sidebar-menu glyphicon glyphicon-tags"><a href="/admin/tags"> Tags</a></li>
        <li class="sidebar-menu glyphicon glyphicon-euro"><a href="/admin/currencies"> Currencies</a></li>
        <li class="sidebar-menu glyphicon glyphicon-globe"><a href="/admin/languages"> Languages</a></li>
        <li class="sidebar-menu glyphicon glyphicon-picture"><a href="/admin/images"> Images</a></li>
    </ul>
    @yield('sidebar')
</div>

<div class="container-fluid">
    <div class="col-md-offset-2 col-md-10 navbar-fix">
        @yield('body')
    </div>
</div>
@stop