@extends('layout')

@section('title', 'Welcome to Trip Adviser')

@section('header')
    <link href="{!! asset('css/carousel.css') !!}" rel="stylesheet">
@stop

@section('content')
@include('carousel')
@stop

