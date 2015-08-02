<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="images/two-mushrooms-217787/two-mushrooms-152-217787.png">
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="images/two-mushrooms-217787/two-mushrooms-144-217787.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap-theme.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/yamm.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet">
    @yield('header')
</head>
<body>
    @include('navbar')
    @yield('content')


    <div id="popupWindow" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @if (!Auth::check())
                        <h4 class="modal-title">Please Login to continue</h4><hr/>
                        <div style="width:100%">
                            {!! Form::open(array('url' => 'login')) !!}
                            <input name="email" type="text" class="form-control" placeholder="username/email">
                            <input name="password"  type="password" class="form-control" placeholder="password">
                            <button type="submit" class="btn btn-info" style="margin-top:10px;width:100%">Login</button>
                            {!! Form::close() !!}
                            {!! Form::open(array('url' => 'facebook/callback')) !!}
                            <input type="submit" class="btn btn-primary" value="Login with Facebook" style="margin-top:5px;width:100%">
                            {!! Form::close() !!}
                            {!! Form::open(array('url' => 'google/callback')) !!}
                            <input type="submit" class="btn btn-default" value="Login with Google" style="margin-top:5px;width:100%">
                            {!! Form::close() !!}
                        </div>
                    @else

                        <div style="background-color:#F0F0F5;padding:10px">
                            <h4 class="modal-title">Thanks for Booking!</h4><br/>
                            {!! isset($message)?$message:'' !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}" />
    <script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/transition.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/collapse.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script>
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
            e.stopPropagation()
        });
        $(function() {
            $('#datetimepicker4').datetimepicker({
                pickTime: false
            });
        });
        var showModal = {!! isset($showModal)? $showModal : 'false' !!};

        $('document').ready(function(){
            if(showModal)
                $('#popupWindow').modal('show');
        });
/*
        $('#user-login').on('click', function(e){
            $(this).hide();
            $('#user-logout').show();
        });
        $('#user-logout').on('click', function(e){
            $(this).hide();
            $('#user-login').show();
        });*/
    </script>
    @yield('script');
</body>
</html>