<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/incomerx-icon.png">
    <title>{{ strtoupper(env('APP_NAME')) }} | Welcome</title>

    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('css/metro-bootstrap.min.css') !!}
    {!! Html::style('css/sign-in.css') !!}

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/src/font-awesome.min.css" type="text/css">

    <!-- Custom CSS -->
    {!! Html::style('css/general.css') !!}

    <!-- Font Awesome -->
    {!! Html::style('css/font-awesome.min.css') !!}

    <!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="main-body">

<div class="container-fluid">
    <div class="header col-md-8"></div>
    <div class="col-md-4">
        <div class="login">
            <div class="img col-md-12">
                <div class="col-md-8">
                    <img src="images/incomerx-logo.png" width="335px">
                </div>
            </div>
            <span class="span-home">Please, enter your credentials to logging on</span>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Username</label>

                    <div class="col-md-8">
                        <input type="username" class="form-control" name="username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4 chk-remember">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4 btn-login">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn ion-log-in fa-lg"></i>Login
                        </button>

                        {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>