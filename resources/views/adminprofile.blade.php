<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>User Profile</title>
</head> 
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="{{ asset('css/logo.png') }}">
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('adminprofile') }}">Profile</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li>
                        <x-responsive-nav-link :href="route('logout')"  style="color:white"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                              <span class="glyphicon glyphicon-log-out">{{ __('Logout') }}</span>  
                        </x-responsive-nav-link>
                    </li>
                    </form>
                    <!-- <li><a responsive-nav-link :href="route('logout')"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">
    @if(isset(Auth::user()->userID))
    <div class="alert alert-danger success-block">
        <strong>Welcome {{ Auth::user()->userID}}</strong>
    </div>
    @else
    @endif  
        <div class="row content">
            <div class="col-sm-2 sidenav">
               <nav id="sidebar">
                   <ul class="list-unstyled components" >
                       <li>
                           <a href="{{ route('dashboard') }}">Home</a>
                       </li>
                       <li>
                           <a href="{{ route('records') }}">Records</a>
                       </li>   
                   </ul>
               </nav> 
            </div>    
            <div class="col-sm-8 text-left">
                <h3>Profile</h3>
                <p>Admin Details</p>
                <hr>
                <p>My Profile</p>
                <br>

                <div class="col-sm-8 text-left">
                    <!--Vertical Heading Table-->
                    
                     <table class="profiletable">
                        <tr>
                            <th class="tab_title">ID :</th>
                            <td>{{Auth::user()->username}}</td>
                        </tr>
                        <tr>
                            <th class="tab_title">Name :</th>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <th class="tab_title">Email :</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th class="tab_title">Phone Number :</th>
                            <td>____________</td>
                        </tr>
                    </table>
            </div>
        </div>

            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Copyright 2020  |  Developed By IIUMVeRS</p>
    </footer>    
    
</body>
</html>