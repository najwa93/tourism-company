
@extends('Layouts.Admin_app')
@section('title')
    حـذف شـركة طيـران
@endsection
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
    .p1{
    background-image:  url("{{asset('images/latravel1.jpg')}}");
    width: 100%;
    height: 300px;
    background-size:cover;
    overflow-y: auto;
    overflow-x: auto;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: -1px;
    opacity: 0.9;
    }

    </head>
@endsection

@section('content')
    <div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp; حـذف شـركة طيـران</label></div>
    <br>
    <div class="container">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <label style=" font-size: 25px;
    color:#f73917; font-weight: bold;"><span class="glyphicon glyphicon-download" style="color: orange;"></span>&nbsp;هل تريد بالتأكيد القيام بعملية حـذف شـركة طيـران ؟ </label>
            <hr>
            <br>
            <br>
            <form action="{{route('FlightCompany.destroy',$flightCompany->id)}}" method="POST" >
                {{csrf_field()}}
                @method('DELETE')
                <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                    <div class="form-group ">
                        <label for="usr">اسـم شـركة الطيـران</label>
                        <input type="text" class="form-control" id="usr" name="name" value="{{$flightCompany->name}}" placeholder="أدخــل اســم  شـركة الطيران" style="font-size: 22px; scolor: black;">
                    </div>
                    <br>
                    <div class="form-group ">
                        <label for="usr">البريد الالكتروني</label>
                        <input type="text" class="form-control" id="usr" name="email" value="{{$flightCompany->email}}" placeholder="أدخــل  البريد الالكتروني" style="font-size: 22px; color: black;">
                    </div>
                    <br>
                    <div class="form-group ">
                        <label for="usr">رقـم الهاتـف</label>
                        <input type="text" class="form-control" id="usr" name="phone_number" value="{{$flightCompany->phone_number}}"  placeholder="أدخــل  رقم الهاتـف" style="font-size: 22px; color: black;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info" name="btnc"
                            style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                                class="glyphicon glyphicon-floppy-save" style="color: #ff3928;"></span>&nbsp;حذف
                    </button>                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
@endsection