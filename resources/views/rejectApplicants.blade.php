<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>Approval</title>
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
                                <a href="{{ route('records') }}">Records</a>
                            </li>
                            <li>
                                    <a href="{{ route('adminprofile') }}">Profile</a>
                                </li>   
                        </ul>
                    </nav> 
                </div>    
            <div class="col-sm-8 text-left">
                <h3>Application Approval</h3>
                <p>Approval of the application</p>
                <hr>
                <p>Application's Details</p>
                <br>

                <div class="col-sm-8 text-left">
                    <!--Vertical Heading Table-->
                    <div>
                            <table>
                                <form action="/approval/{{ $applicants[0]->username }}">
                                {{ csrf_field() }}
                                    <tr>
                                        <th>Name:</th>
                                        <td style="width:150%"><input type="text" class="form-control" name="name" id="name" value="{{ $applicants[0]->name }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Username:</th>
                                        <td><input type="text" class="form-control" name="username" id="username" value="{{ $applicants[0]->username }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number:</th>
                                        <td><input type="text" class="form-control" name="phoneno" id="phoneno" value="{{ $applicants[0]->phoneno }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="text" class="form-control" name="email" id="email" value="{{ $applicants[0]->email }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Type:</th>
                                        <td><input type="text" class="form-control" name="type" id="type" value="{{ $applicants[0]->type }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td><input type="text" class="form-control" name="status" id="status" value="{{ $applicants[0]->status }}" readonly></td>
                                    </tr>
                                </form>

                                <form action="/approval/{{ $vehregs[0]->username }}">
                                {{ csrf_field() }}
                                    <tr>
                                        <th>Vehicle Type:</th>
                                        <td><input type="text" class="form-control" name="type" id="type" value="{{ $vehregs[0]->type }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Registration Number:</th>
                                        <td><input type="text" class="form-control" name="plateno" id="plateno" value="{{ $vehregs[0]->plateno }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Brand:</th>
                                        <td><input type="text" class="form-control" name="brand" id="brand" value="{{ $vehregs[0]->brand }}" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Model:</th>
                                        <td><input type="text" class="form-control" name="model" id="model" value="{{ $vehregs[0]->model }}" readonly></td>
                                    </tr>
                                </form>
                    <form action="/reject/{{ $applicants[0]->username }}" method="POST">
                    {{ csrf_field() }}
                                    <tr>
                                        <th>Reason of Reject:</th>
                                        <td><input type="text" class="form-control" name="rejectedReason" id="rejectedReason" placeholder="State a reason of rejection" :value="old('rejectedReason')" required autofocus></td>
                                    </tr>
                            </table>
                    </div>

                    
                <div class="approvalButton2">
                        <button type="submit" name="submit" class="btn btn-default" style="background-color: #003D7B; color:white; margin-left:6px; margin-top:50px; margin-bottom: 50px" value="Reject">Reject</button>
                    </form>
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