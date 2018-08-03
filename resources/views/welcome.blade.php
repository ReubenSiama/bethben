<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BethBen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('https://orig00.deviantart.net/d9a7/f/2010/121/8/1/f_stock___png_background_4_by_missimoinsane_stock.png'), url('https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/rZJIMvhmliwmde8a6/guy-and-girl-walking-holding-hands-loving-couple-walk-on-sunset-background-silhouette-of-loving-couple-love-story_bylzrgfbl_thumbnail-full01.png');
                color: #636b6f;
                background-repeat: no-repeat,no-repeat;
                background-position: center;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

            /* .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            
            .form-control{
                border-radius:0px;
            } */
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="color:white">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color:white;" href="{{ url('/home') }}">Home</a>
                    @else
                        <!-- <a style="color:white;" href="#">Login</a> -->
                        <!-- <a style="color:white;" href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif
            <br><br><br><br>
            <div class="content col-md-8">
                <div class="title m-b-md">
                   <center>
                    <span style="color:green;background-color:white;">Beth</span><span style="color:white;background-color:green;">Ben</span>
                   </center>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success" style="border-radius:0px; border:none;">
                    <div class="panel-heading" style="height:50px; background-color: #84604f; border-radius:0px; color:white;"><b>Login</b></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/login" aria-label="{{ __('Login') }}" style="color:black;">
                            @csrf
                            <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" required class="form-control" style="border-color:{{ session('error') ? 'red' : '' }}" value="{{ old('email') }}" id="email" placeholder="Enter email" name="email">
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">          
                                <input type="password" required class="form-control" style="border-color:{{ session('error') ? 'red' : '' }}" id="pwd" placeholder="Enter password" name="password">
                            </div>
                            </div>
                            <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10" style="color:red;">
                                @if(session('error'))
                                    <b>* {{ session('error') }}<b>
                                @else
                                    &nbsp;
                                @endif
                            </div>
                            </div>
                            <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn" style="color:black; border-radius:0px; background-color:#c8e5b9;"><b>Login</b></button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer" style="color:white; background-color:#c6a99b;">
                        <center>
                            <b>
                                Not a member? <a style="color:black;" href="{{ route('register') }}">Register Here</a>
                            </b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
