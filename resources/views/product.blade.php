@extends('layout')

@section('title', 'Welcome to Product Page')
@section('header')
    <link href="/css/lightbox.css" rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1 navbar-fix">
        <div class="col-sm-9 col-md-9 content-section">
            <h2>Oktoberfest Tour in Munich</h2>
            <div class="col-sm-12 product-gallery text-center">
                <img style="max-width:100%;height:100%" src="/images/oktober1.jpg" alt="My Image file"></img>
            </div>
            <a href="/images/oktober1.jpg"  data-lightbox="oktoberfest"><img class="thumbnail visible-md-inline visible-lg-inline col-md-2" src="/images/oktober1.jpg" alt="My Image file"></img></a>
            <a href="/images/oktober2.jpg"  data-lightbox="oktoberfest"><img data-lightbox="oktoberfest" class="thumbnail visible-md-inline visible-lg-inline col-md-2" src="/images/oktober2.jpg" alt="My Image file"></img></a>
            <a href="/images/oktober3.jpg"  data-lightbox="oktoberfest"><img data-lightbox="oktoberfest" class="thumbnail visible-md-inline visible-lg-inline col-md-2" src="/images/oktober3.jpg" alt="My Image file"></img></a>
            <a href="/images/oktober4.jpg"  data-lightbox="oktoberfest"><img data-lightbox="oktoberfest" class="thumbnail visible-md-inline visible-lg-inline col-md-2" src="/images/oktober4.jpg" alt="My Image file"></img></a>

            <hr/>

            <div class="col-sm-12 sidebar-tab sidebar-tab-special visible-xs-block">
                <a class="btn-book-now text-uppercase" href="/order/oktoberfest">Book Now</a><br>
                <div style="font-weight:500;border-bottom: 1px solid lightgray;font-size: 1.2em">From <span style="color:black;font-size: 1.5em; font-weight: 600">€334</span></div>
                <div style="font-size: 0.8em">(Per Group upto 3)</div>
            </div>
            <div class="product-body">
                <h4>Highlights:</h4>
                <ul>
                    <li>Choose a full or half day chauffeured tour in London</li>
                    <li>Visit some of the most famous sites from the Harry Potter film franchise</li>
                    <li>See the famous Hogwarts Express Platform 9-3/4</li>
                    <li>Decide which of the many sights you’d like to visit</li>
                </ul>
                <h4>Overview:</h4>
                You’ve seen the movies and read the books, and now you can step onto the central London sets used in filming the Harry Potter series. You'll be chauffeured in luxury to all of the sites and inspirations for the films, and feel the magic in the air!

            <h4>Description:</h4>

                This private tour is perfect for Harry Potter fanatics, from couples to groups of up to 8 persons. You’ll be chauffeured around London in luxury to see all things Potter.
    <br/>
            You can go to as few or as many Harry Potter sites as you like, given the allotted time, or even somewhere off the map that’s still within tour limits.
            <br/>
                There’s a choice between a full-day or half-day tour, and some of the suggested sightseeing options are:
                <ul>
                    <li>The bridge where the Knight Bus squeezes between 2 London red buses in The Prisoner of Askaban</li>
                    <li>The route that Harry flies in The Order of the Phoenix en route to 12 Grimauld Place</li>
                    <li>A visit to the florist, which was the first of the secret entrances to the Leaky Cauldron Pub, and the optician's, which was the second secret entrance</li>
                    <li>A trip to the real life market that was the inspiration for Diagon Alley</li>
                    <li>A walk across the bridge that collapses in the opening scene of Harry Potter and the Half Blood Prince</li>
                    <li>The building that was used for the interior of Gringott’s Bank</li>
                    <li>The entrance to the Magical Ministry used in the films</li>
                    <li>Platform 9-3/4</li>
                </ul>

                End your tour with a visit to the London Zoo and its reptile house. This is where Harry finds out he can speak Slytherine, the language of snakes. Depending on how long you wish to stay, your chauffeur can wait and take you back to your hotel or leave you to spend more time at the Zoo.
            <br/><h4>What's Included:</h4>
                <ul>
                    <li>Pick-up and drop off at your central London accommodation</li>
                    <li>Chauffeured transportation to tour sites</li>
                </ul>

                <h4>What's Not Included:</h4>
                <ul>
                    <li>Admission to attractions other than those specified (if applicable)</li>
                </ul>

                <h4>Good to Know:</h4>
                This tour does not include any additionall fees such as admissions or special charges as all of the sites visited are public places.
            </div>
        </div>
        <div class="col-sm-3 col-md-3 content-sidebar text-center"  style="margin-top:75px">
            <div class="col-sm-12 sidebar-tab sidebar-tab-special">
                <a class="btn-book-now text-uppercase" href="/order/oktoberfest">Book Now</a><br>
                <div style="font-weight:500;border-bottom: 1px solid lightgray;font-size: 1.2em">From <span style="color:black;font-size: 1.5em; font-weight: 600">€334</span></div>
                <div style="font-size: 0.8em">(Per Group upto 3)</div>
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">We Promise</span>
                <span class="glyphicon glyphicon-ok" style="color:green"></span> Speedy booking<br>
                <span class="glyphicon glyphicon-ok" style="color:green"></span> Best Price Gurantee
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">Provider</span>
                <span>Soma Tours and Travels</span>
            </div>
            <div class="col-sm-12 sidebar-tab text-left">
                <span class="sidebar-tab-title">Location</span>
                <span>Munich, Germany</span>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script src="/js/lightbox.min.js"></script>
@stop