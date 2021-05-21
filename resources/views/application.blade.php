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
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#"> Home</a></li>
                    <li><a href="#">Applications</a></li>
                    <li><a href="#">Status</a></li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right"> 
                    <li>
                        <a href="{{ route('userprofile') }}">Profile</a>
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
                           <a href="{{ route('status') }}">Status</a>
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
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->phone }}</div>
                            <br>
                        </div> 
                    </div>
                </div>
                <hr>
                <div class="container-left">
                    <form action="/create" method = "post" class="needs-validation" novalidate>
                    @csrf
                        <div class="form-group col-md-6">
                        <h4>Particulars of Vehicle 1</h4>
                        <br>
                            <label for="plateNo">Vehicle Registration Number:</label>
                            <input class="form-control form-control-sm" type="text" name='plateNo' placeholder="Vehicle Registration Number" required>
                            <br>
                            <label for="colour">Colour(Vehicle):</label>
                            <input class="form-control form-control-sm" type="text" name='colour' placeholder="Vehicle colour">
                            <br>
                            <label for="type">Type of vehicle</label>
                            <input class="form-control form-control-sm" type="text" name='type' placeholder="Motorcycle / Car">
                            <br>
                            <label for="brand">Brand:</label>
                            <input class="form-control form-control-sm" name="brand" type="text" placeholder="Brand">
                            <br>
                            <label for="model">model</label>
                            <input class="form-control form-control-sm" name="model" type="text" placeholder="Model">
                        </div>
                        <input type = 'submit' value = "Submit"/>
                    </form>
                </div>
                <!-- <div class="container-right">
                    <form action="/action_page.php" data-toggle="validator">
                        <div class="form-group col-md-6">
                        <h4>Particulars of Vehicle 2</h4>
                        <br>
                            <label for="plateNo">Vehicle Registration Number:</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Vehicle Registration Number">
                            <br>
                            <label for="colour">Colour(Vehicle):</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Vehicle colour" required>         
                            <br>
                            <label for="type">Type of vehicle</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Motorcycle / Car">
                        </div>                     
                    </form>
                </div> -->
                <p>*Please recheck your vehicle details</p>
                <hr>
                <div class="needs-validation">                   
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                 You must agree before submitting.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" style="background-color: #003D7B; color:white">Submit</button>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>Copyright 2020  |  Developed By IIUMVeRS</p>
    </footer>       
</body>
</html>