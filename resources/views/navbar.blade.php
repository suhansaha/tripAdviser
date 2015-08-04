<nav class="navbar navbar-default navbar-fixed-top yamm">
    <div class="container col-md-10 col-md-offset-1 col-sm-12">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="javascript:alert('You have 0 item in your cart');" class="btn navbar-toggle collapsed glyphicon glyphicon-shopping-cart"></a>
            <a class="navbar-brand" href="/"><img style="position:absolute;top:1px;left:0px;height:49px;"  alt="Brand" src="{!! asset('images/logo.png') !!}"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="text-align: center">
            <div style="max-width:600px;margin:0 auto">
                {!! Form::open(array('url' => '/', 'class'=>'navbar-form navbar-left','role'=>'search')) !!}
                    <div id="datetimepicker4" class="input-append input-group">
                        <input data-format="dd-MM-yyyy" type="text" class="form-control  add-on" placeholder="When are you going?" style="border-color:#85C2FF;top:1px;">
            <span class="input-group-btn">
              <!--<span class="input-group-addon glyphicon glyphicon-calendar btn btn-info" id="basic-addon2" style="line-height: 1.45!important;"></span>-->
              <button type="button" class="btn btn-info glyphicon glyphicon-calendar" style="line-height: 1.45!important;"></button>
            </span>
                    </div>&nbsp;
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Where are you going?" style="border-color:#85C2FF;top:1px;">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info glyphicon glyphicon-search" style="line-height: 1.45!important;"></button>
            </span>
                    </div>
                {!! Form::close() !!}
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                <li class="dropdown">
                @if (Auth::check())
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="height:50px;min-width:70px;background:url('{!! Auth::user()->avatar == null? asset('images/guest.png') : Auth::user()->avatar!!}') 15px no-repeat;background-size: 50px 50px;-webkit-background-size:  50px 50px;-moz-background-size:  50px 50px;-o-background-size:  50px 50px;">
                        <span class="hidden-xs caret" style="margin-left: 55px"></span>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="hidden-xs caret"></span>
                @endif
                        <span class="visible-xs-inline"> My Profile</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <!-- Your Menu Goes Here -->
                                    @if (!Auth::check())
                                    <div style="width:100%" id="user-login">
                                        {!! Form::open(array('url' => 'login')) !!}
                                            <input name="email" type="text" class="form-control" placeholder="username/email">
                                            <input name="password" type="password" class="form-control" placeholder="password">
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

                                    <div  id="user-logout">
                                        <a href="#"><span class="glyphicon glyphicon-user"> My Profile</span></a><br/>
                                        <a href="#"><span  style="margin-top:10px;" class="glyphicon glyphicon-cog" > Settings</span></a><br/>

                                        {!! Form::open(array('url' => 'logout','method' => 'get')) !!}
                                            <button type="submit" class="btn btn-default glyphicon glyphicon-off" style="margin-top:10px;width:100%">&nbsp;Logout</button>
                                        {!! Form::close() !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
