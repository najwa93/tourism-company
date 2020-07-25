@extends('Layouts.Admin_app')

@section('styles')

    *{
    margin: 0;
    padding: 0;
    }
    body{
    }
    .header{
    width: 100%;
    height:52px;
    }
    .navbar {
    background-color:#64AEF7;
    z-index: 9999;
    border: 0;
    font-size: 20px !important;
    line-height: 1.5 !important;
    border-radius: 0;
    }
    .navbar li a, .navbar .navbar-brand {
    color: white !important;
    }

    .navbar li a.dropdown-item{
        color:#428bca !important;
        margin-right:12px;
        font-size:18px;
        font-weight:bold;
    }

    .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #64AEF7 !important;
    background-color: #fff !important;
    }
    .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
    }
    @media screen and (max-width: 800px) {
    .col-sm-4 {
    text-align: center;
    margin: 25px 0;
    }

    }
    .btn {
    width: 370px;
    height: 166px;
    padding: 14px 28px;
    font-size: 30px;
    cursor: pointer;
    display: inline-block;
    }

    /* Green */
    .success {
    border-color: #4CAF50;
    color: green;
    }

    .success:hover {
    background-color: #4CAF50;
    color: white;
    }

    /* Blue */
    .info {
    border-color: #2196F3;
    color: dodgerblue;
    }

    .info:hover {
    background: #2196F3;
    color: white;
    }

    /* Orange */
    .warning {
    border-color: #ff9800;
    color: orange;
    }

    .warning:hover {
    background: #ff9800;
    color: white;
    }

    /* Red */
    .danger {
    border-color: #f44336;
    color: red;
    }

    .danger:hover {
    background: #f44336;
    color: white;
    }
    @media screen and (max-width: 1000px) {
    .col-md-4
    {
    text-align: center;
    margin: 25px 0;
    }

    .col-xs-12{
    text-align: center;
    margin: 25px 0;
    }
    }
@endsection
@section('content')
    <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span
                class="glyphicon glyphicon-king" style="color: orange;"></span>&nbsp; خـيارات المـديـر
    </div>
    <div class="container">
        <br>
        <br>
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 7 or \Illuminate\Support\Facades\Auth::user()->role_id == 1)

                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="{{route('Countries.index')}}">
                        <button class="btn success"><span class="glyphicon glyphicon-globe"></span><br>إدارة البلدان
                        </button>
                    </a></div>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3 or \Illuminate\Support\Facades\Auth::user()->role_id == 1)
                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="{{route('Hotels.index')}}">
                        <button class="btn warning"><span class="glyphicon glyphicon-cutlery"></span><br>إدارة الفنادق
                        </button>
                    </a></div>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2 or \Illuminate\Support\Facades\Auth::user()->role_id == 1)
                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="{{route('Flights.index')}}">
                        <button class="btn info"><span class="glyphicon glyphicon-plane"></span><br>إدارة الرحلات الجوية
                        </button>
                    </a>
                </div>
            @endif
            <br>
        </div>
        <br>
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 )
                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-users.php">
                        <button class="btn info"><span class="glyphicon glyphicon-user"></span><br>إدارة المستخدمين
                        </button>
                    </a>
                </div>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 4 or \Illuminate\Support\Facades\Auth::user()->role_id == 1)
                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="{{route('Offers.index')}}">
                        <button class="btn success"><span class="glyphicon glyphicon-gift"></span><br>العروض السياحية
                        </button>
                    </a>
                </div>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5 or \Illuminate\Support\Facades\Auth::user()->role_id == 1)
                <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-support.php">
                        <button class="btn danger"><span class="glyphicon glyphicon-envelope"></span><br>الرسـائل
                        </button>
                    </a>
                </div>
            @endif
            <br>
        </div>
        <br>
        <br>
    </div>
    </div>

@endsection

