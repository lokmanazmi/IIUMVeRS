
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <title>IIUMVeRS</title>
</head>

    <body>
        <div class="bg">
            <div>
                    <!--Top Navbar-->
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                    </button>
                                    <img src="{{ asset('css/logo.png') }}">
                                </div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav navbar-right">
                                    <div style="margin-top:14px; margin-right:10px; scale:120%">
                                    @if (Route::has('login'))
                                        @auth
                                            <li>
                                                <!-- <a href="{{ url('/dashboard') }}" style="color:white">Dashboard</a> -->
                                            </li>
                                        @else
                                           
                                                <button ><a href="{{ route('login') }}" style="color:Black">Log in</a></button>
                                            

                                            @if (Route::has('register'))
                                           
                                                <!-- <button><a href="{{ route('register') }}" style="color:Black">Register</a></button> -->
                                           
                                            @endif

                                        @endauth   
                                    @endif  
                                    </div>
                                    </ul>
                                </div>
                            </div>
                        </nav>
            </div>
        </div>

        <!--Body Content-->
        <div class="container-fluid text-center">  
                <div class="col-sm-8 text-left">
                    <div class="welcome">                            
                        <h2>WELCOME TO IIUMVeRS</h2>
                        <p class="description">IIUM vehicle registration system for IIUM <br> 
                            community. Make life easier to apply for <br> 
                            vehicle sticker 24/7</p>
                        <br>
                    </div>
                </div>
    </body>
</html>
