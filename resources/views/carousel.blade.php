<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="content-section carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="{!! asset('images/Ganesh-Chathurthi-2014.jpg') !!}" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Visit Ganesh Chaturthi at Mumbai</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="/order/Visit_Ganesh_Chaturthi" role="button">Book Now</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="{!! asset('images/oktoberfest.jpg') !!}" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Enjoy Oktoberfest at Munich</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="/product/oktoberfest" role="button">Book Now</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="{!! asset('images/1DurgaPuja_AP.jpg') !!}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Experience Durga Puja at Kolkata</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="/order/Experience_Durga_Puja" role="button">Book Now</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

