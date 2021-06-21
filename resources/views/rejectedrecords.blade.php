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
    <title>Application Record</title>
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
                        <li class="active">
                            <a href="{{ route('records') }}" data-toggle="collapse" aria-expanded="false">Records</a>
                        </li>
                        <li>
                            <a href="{{ route('adminprofile') }}">Profile</a>
                        </li>
                    </ul>
                </nav> 
                </div>    
                <div class="col-sm-8 text-left">
                    <h3>Application Records</h3>
                    <p>History and details of previous records</p>
                    <hr>
                    <p>Record Details</p>
                    <br>

                    <button style="background-color: #fff"><a href="{{ route('records') }}">Approved Applicants</a></button>
                    <button style="background-color: #003D7B ; color: #fff">Rejected Applicants</button>
                    <button style="background-color: #fff"><a href="{{ route('revokedrecords') }}">Revoked Applicants</a></button>

                    <!--Applicants List-->
                        <!-- Table -->
                        <table class="horizontaltable">
                        <tr id="text">
                            <th>Date</th>
                            <th>Time</th>
                            <th>Reg.Number</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Vehicle Type</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Status</th>
                            <th>Reason of Rejection</th>
                        </tr>

                        <!-- Table Content  -->
                        @foreach($rejecteddata as $row)   
                                <tr>
                                    <td>{{ $row->updated_at->format('d-m-Y')}}</td>
                                    <td>{{ $row->updated_at->toTimeString()}}</td>
                                    <td>{{ $row->plateno }}</td>
                                    <td>{{ $row->name }}</a></td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->brand}}</td>
                                    <td>{{ $row->model }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->rejectedReason }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        <p>*sorted by latest application</p>

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