
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
        <div >
            <!--Top Navbar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                        </button>
                        <img src="{{ asset('css/logo.png') }}">
                    </div>
                </div>
            </nav>

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
                <div class="col-sm-2 sidenav">
                    <!--Login Navbar-->
                    <div class="animation"> <!--Animation-->
                        <nav  class="row content" id="sidebar">
                            <ul class="list-unstyled components" >
                                <div class="row content">
                                <br>
                                <img src="{{ asset('css/logo.png') }}" style="padding:50px">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <form method="POST" action="{{ route('login') }}">
                                    {{csrf_field() }}
                                        <div class="mt-4">                                
                                            <x-label for="username" :value="__('Username')" />
                                            <br>
                                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                                            <br>
                                        </div>
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />
                                            <br>
                                            <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                            <br>
                                        </div>
                                        <div class="mt-4">
                                        <!-- Remember Me -->
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        
                                            
                                            <br>
                                            <x-button class="ml-3">
                                        
                                                {{ __('Log in') }}
                                            </x-button>
                                            <br>
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </form>                                 
                                </div>
                            </ul>
                            
                            <div class="login_desc">
                                <p>For security reasons, please log out</p> 
                                <p>and exit your web browser when you</p>
                                <p>are done accessing service</p>
                            </div>
                            </nav>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <footer class="container-fluid text-center">
            <p>Copyright 2020  |  Developed By IIUMVeRS</p>
        </footer>
    </div>       
</body>
</html>