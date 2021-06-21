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

    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Application</title>
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
        <div class="row content">
            <div class="col-sm-2 sidenav">
               <nav id="sidebar">
                   <ul class="list-unstyled components" >
                       <li >
                           <a href="{{ route('dashboard') }}">Home</a>
                       </li>
                       <li class="active">
                            <a href="#" data-toggle="collapse" aria-expanded="false">Application</a>
                       </li>
                       <li>
                           <!-- <a href="{{ route('status') }}">Status</a> -->
                       </li>
                       <li>
                            <a href="{{ route('userprofile') }}">Profile</a>
                       </li>
                   </ul>
               </nav> 
            </div>

            <div class="col-sm-8 text-left">
                <h4>Particulars of Applicant</h4>
                <p>Please check your details </p>
                <div class="container">
                    <div class="form-group">                       
                        <div class="col-md-6">
                            <label for="name">Name:</label>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="typeUser">Student / Staff</label>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->type }}</div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="Phone">Phone Number:</label>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->phoneno }}</div>
                            <br>
                        </div> 
                    </div>
                </div>
                <hr>
                <div class="container-left">
                    <form method="POST" action="/application">
                     @csrf
                        <div class="form-group col-md-6">
                            <h4>Particulars of Vehicle </h4>
                            <br>
                            <label for="plateno">Vehicle Registration Number:</label>
                            <input id="plateno" class="form-control form-control-sm" type="text" name="plateno" placeholder="Vehicle Registration Number" :value="old('plateno')" required autofocus>
                            <br>
                            <label for="colour">Colour(Vehicle):</label>
                            <input id="colour" class="form-control form-control-sm" type="text" name="colour" placeholder="Vehicle colour" :value="old('colour')" required autofocus>
                            <br>
                            <label for="type">Type of vehicle</label>
                            <input id="type" class="form-control form-control-sm" type="text" name="type" placeholder="Motorcycle / Car" :value="old('type')" required autofocus>
                            <br>
                            <label for="brand">Brand of vehicle</label>
                            <input id="brand" class="form-control form-control-sm" type="text" name="brand" placeholder="Brand, Eg : Honda" :value="old('brand')" required autofocus>
                            <br>
                            <label for="model">Model of vehicle</label>
                            <input id="model" class="form-control form-control-sm" type="text" name="model" placeholder="Model, Eg : EX5" :value="old('model')" required autofocus>
                        

                            <div class="needs-validation">
                            <br>
                                <p>*Please recheck your vehicle details</p>                   
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agreed information provided are correct
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default" style="background-color: #003D7B; color:white">Submit</button>
                                </div>
                            </div>
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