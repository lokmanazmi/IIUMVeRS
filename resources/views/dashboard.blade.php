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
        <div class="container-fluid text-center"> 
            <div class="row content">
                <div class="col-sm-2 sidenav">
                <nav id="sidebar">
                    <ul class="list-unstyled components" >
                        <li class="active">
                            <a href="#" data-toggle="collapse" aria-expanded="false">Home</a>
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
                    <h3>Applicants</h3>
                    <p>List of waiting applicants</p>
                    <hr>
                    <p>Applicant Details</p>
                    <br>
                    <!--Applicants List-->
                        <!-- Table -->
                        <div style="overflow-x:auto;">
                            <table>
                            
                                <tr>
                                    <th>Date</th>
                                    <th>Reg.Number</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            

                            
                            @foreach($data as $row)   
                                <tr>
                                    <td>{{ $row->created_at->format('d-m-Y')}}</td>
                                    <td>{{ $row->plateno }}</td>
                                    <td>{{ $row->name }}</a></td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <button>
                                            <a href="approval/{{$row->username}}">
                                                Approve
                                            </a>
                                        </button>
                                        <button>
                                            <a href="rejectApplicants/{{$row->username}}">
                                                Reject
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        

                        
                            </table>
                            <br>
                            <p>*sorted by application queue</p>
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