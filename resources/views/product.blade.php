@extends('layout')

@section('title', $text->title)
@section('header')
    <link href="/css/lightbox.css" rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1 navbar-fix">
        <div class="col-sm-9 col-md-9 content-section">
            <h2>{!! $text->title !!}</h2>
            @if($text->product->coverImageId !=null )
            <div class="col-sm-12 product-gallery text-center">
                <img style="max-width:100%;height:100%" src="/{!! $text->product->coverImage->url !!}" alt="My Image file"></img>
            </div>
            @endif
            
            @foreach($text->product->images as $image)
            <a href="/{!! $image->url !!}"  data-lightbox="oktoberfest"><img data-lightbox="oktoberfest" class="thumbnail visible-md-inline visible-lg-inline col-md-2" src="/{!! $image->url !!}" alt="{!! $image->title !!}"></img></a>
            @endforeach
            <hr/>

            <div class="col-sm-12 sidebar-tab sidebar-tab-special visible-xs-block text-center">
                <a class="btn-book-now text-uppercase" href="/order/oktoberfest">Book Now</a><br>
                <div style="font-weight:500;border-bottom: 1px solid lightgray;font-size: 1.2em">From <span style="color:black;font-size: 1.5em; font-weight: 600">{!! $text->product->price.' '.$text->product->currency->symbol !!}</span></div>
                <div style="font-size: 0.8em">{!! $text->condition !!}</div>
            </div>
            <div class="product-body">
                {!! $text->description !!}
            </div>
        </div>
        <div class="col-sm-3 col-md-3 content-sidebar text-center"  style="margin-top:75px">
            <div class="col-sm-12 sidebar-tab sidebar-tab-special">
                <a class="btn-book-now text-uppercase" href="/order/oktoberfest">Book Now</a><br>
                <div style="font-weight:500;border-bottom: 1px solid lightgray;font-size: 1.2em">From <span style="color:black;font-size: 1.5em; font-weight: 600">{!! $text->product->price.' '.$text->product->currency->symbol !!}</span></div>
                <div style="font-size: 0.8em">{!! $text->condition !!}</div>
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">We Promise</span>
                <span class="glyphicon glyphicon-ok" style="color:green"></span> Speedy booking<br>
                <span class="glyphicon glyphicon-ok" style="color:green"></span> Best Price Gurantee
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">Provider</span>
                <span>{!! $text->product->vendor->firstName.' '.$text->product->vendor->lastName !!}</span>
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">Location</span>
                <span>{!! $text->product->city->name.', '.$text->product->city->country !!}</span>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script src="/js/lightbox.min.js"></script>
@stop