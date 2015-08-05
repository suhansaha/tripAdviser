@extends('layout')

@section('title', 'Welcome to Festival N\' Fest')

@section('header')
    <link href="{!! asset('css/carousel.css') !!}" rel="stylesheet">
@stop

@section('content')
@include('carousel')
@stop

