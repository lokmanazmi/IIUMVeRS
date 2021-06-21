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
    <title>Dashboard</title>
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
                    <div style="margin-top:14px; margin-right:10px; scale:120%">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="color:white">Logout</a>
                            </form>
                        </li>
                    </div>
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
                           <a href="{{ route('application') }}">Applications</a>
                       </li>
                       <li  class="active">
                           <a href="#" data-toggle="collapse" aria-expanded="false">Status</a>
                       </li>
                       <li>
                            <a href="{{ route('userprofile') }}">Profile</a>
                       </li>
                   </ul>
               </nav> 
            </div>    
            <div class="col-sm-8 text-left">
                <h4>Status of Application</h4>
                <p>Vehicle information </p>
                <div class="container">
                    <div class="form-group">                       
                        <div class="col-md-6">
                            <label for="plateNo">Vehicle Registration Number:</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Vehicle Registration Number" required>
                            <button type="submit" class="btn btn-default" style="background-color: white; color:black">Search</button>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="container-left">
                    <form action="/action_page.php" class="needs-validation" novalidate>
                        <div class="form-group col-md-6">
                        <!-- <h4>Particulars of Vehicle 1</h4> -->
                        <br>
                            <label for="plateNo">Vehicle Registration Number:</label>
                            <!-- <input class="form-control form-control-sm" type="text" placeholder="Vehicle Registration Number" required> -->
                            <br>
                            <label for="type">Type of vehicle:</label>
                            <!-- <input class="form-control form-control-sm" type="text" placeholder="Motorcycle / Car"> -->
                            <br>
                            <label for="status">Status:</label>
                            <!-- <input class="form-control form-control-sm" type="text" placeholder="Vehicle colour"> -->
                            <br>
                            <label for="exdate">Expired Date:</label>
                        </div>
                    </form>
                </div>
                <hr>
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