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
        <div class="row content">
            <div class="col-sm-2 sidenav">
               <nav id="sidebar">
                   <ul class="list-unstyled components" >
                       <li class="active">
                           <a href="#" data-toggle="collapse" aria-expanded="false">Home</a>
                       </li>
                       <li>
                           <a href="{{ route('application') }}">Applications</a>
                       </li>
                       <!-- <li>
                           <a href="{{ route('status') }}">Status</a>
                       </li> -->
                       <li>
                           <a href="{{ route('userprofile') }}">Profile</a>
                       </li>
                   </ul>
               </nav> 
            </div>    
            <div class="col-sm-8 text-left">
            @if(isset(Auth::user()->username))
            <div class="alert alert-success" role="alert" >
                <strong>Welcome {{ Auth::user()->name}}</strong>! to IIUMVeRS.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @else
            @endif 
                <h3>Application</h3>
                <p>Current application </p>
                <hr>
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th><strong>Username</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Phone No</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Type</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row) 
                        <tr>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phoneno }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->type }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
                <p>Details of application</p>

                @foreach($vehreg as $row)

                @if($row->status =='Pending') 

                <table class="table table-striped table-hover table-condensed">
                        <tr>
                            <th>Vehicle Type</th>
                            <td>{{ $row->type }}</td>
                        </tr>
                        <tr>
                            <th>Registration Number</th>
                            <td>{{ $row->plateno }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $row->brand }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $row->model }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $row->status }}</td>
                        </tr>
                        <tr>
                            <th>Date Applied</th>
                            <td>{{ $row->updated_at->format('d-m-Y')}}</td>
                        </tr>
                    </table>

                @elseif($row->status =='Approved')   


                <table class="table table-striped table-hover table-condensed">
                        <tr>
                            <th>Vehicle Type</th>
                            <td>{{ $row->type }}</td>
                        </tr>
                        <tr>
                            <th>Registration Number</th>
                            <td>{{ $row->plateno }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $row->brand }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $row->model }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $row->status }}</td>
                        </tr>
                        <tr>
                            <th>Date Approved</th>
                            <td>{{ $row->updated_at->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <th>Time Approved</th>
                            <td>{{ $row->updated_at->toTimeString()}}</td>
                        </tr>
                        <tr>
                            <th>Sticker No</th>
                            <td>{{ $row->stickerNo }}</td>
                        </tr>
                        <tr>
                            <th>Expired Date</th>
                            <td>{{ $row->expDate }}</td>
                        </tr>
                    </table>


                    @elseif($row->status =='Rejected')  

                    <table class="table table-striped table-hover table-condensed">
                        <tr>
                            <th>Vehicle Type</th>
                            <td>{{ $row->type }}</td>
                        </tr>
                        <tr>
                            <th>Registration Number</th>
                            <td>{{ $row->plateno }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $row->brand }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $row->model }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $row->status }}</td>
                        </tr>
                        <tr>
                            <th>Date Rejected</th>
                            <td>{{ $row->updated_at->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Time Rejected</th>
                            <td>{{ $row->updated_at->toTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Rejected Reason</th>
                            <td>{{ $row->rejectedReason }}</td>
                        </tr>
                    </table>


                    @elseif($row->status =='Revoked')  

                    <table class="table table-striped table-hover table-condensed">
                        <tr>
                            <th>Vehicle Type</th>
                            <td>{{ $row->type }}</td>
                        </tr>
                        <tr>
                            <th>Registration Number</th>
                            <td>{{ $row->plateno }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $row->brand }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $row->model }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $row->status }}</td>
                        </tr>
                        <tr>
                            <th>Date Revoked</th>
                            <td>{{ $row->updated_at->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Time Revoked</th>
                            <td>{{ $row->updated_at->toTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Reason of Revoking</th>
                            <td>{{ $row->revokedReason }}</td>
                        </tr>
                    </table>
                    @endif
                    @endforeach
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