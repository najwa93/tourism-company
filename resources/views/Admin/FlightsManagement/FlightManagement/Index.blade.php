@extends('Layouts.Admin_app')
@section('title')
    إدارة رحـلات الـطيران
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
    background-image: url("{{asset('images/latravel1.jpg')}}");
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
@endsection

@section('content')
    <div class="p1"><label
                style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span
                    class="glyphicon glyphicon-plane" style="color: orange;"></span>&nbsp;إدارة رحـلات الطيـران</label>
    </div>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-xs-12" style="float: right;">
                <a href="{{route('Flights.create')}}" style="text-decoration:none ;">
                    <button type="button" class="btn btn-block"
                            style="background-color:#64AEF7; color: white; height: 40px; font-size: 22px; font-weight: bold;">
                        <span class="glyphicon glyphicon-plus" style="color: orange;"></span>&nbsp;&nbsp;إضــافــة
                        رحـلـة طـيـران جــديــدة
                    </button>
                </a>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>&nbsp;&nbsp;قــائـــمـــة رحـلات
                الطـيـران</label></div>
        <!-- Table -->
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">من المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">إلى المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">التاريخ
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الوقت
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">شركة الطيران
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد اقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد السياحية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة الاقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة السياحية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px; width: 200px; color: white;background-color: #64AEF7">خــيــارات
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
            <tr>
                @foreach($allData as $value)
                    <td>{{$value['source_city']}}</td>
                    <td>{{$value['destination_city']}}</td>
                    <td>{{$value['date']}}</td>
                    <td>{{$value['time']}}</td>
                    <td>{{$value['flight_company']}}</td>
                    <td>{{$value['economy_seats_count']}}</td>
                    <td>{{$value['first_class_seats_count']}}</td>
                    <td>{{$value['economy_ticket_price']}}</td>
                    <td>{{$value['first_class_ticket_price']}}</td>
                    <td>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="man-room.php">
                                    <button type="button" class="btn btn-danger">حذف</button>
                                </a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{route('Flights.edit',$value['flight_id'])}}">
                                <button type="button" class="btn btn-warning">تعديل</button>
                                </a>
                            </div>
                        </div>
                    </td>

            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <hr>
        <div class="row">
            <div class="col-xs-12" style="float: left;">
                <a href="{{route('FlightCompany.create')}}" style="text-decoration:none ;">
                    <button type="button" class="btn btn-block"
                            style="background-color:#64AEF7; color: white; height: 40px; font-size: 22px; font-weight: bold;">
                        <span class="glyphicon glyphicon-plus" style="color: orange;"></span>&nbsp;&nbsp;إضــافــة شـركة
                        طـيـران جــديــدة
                    </button>
                </a>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>&nbsp;&nbsp;قــائـــمـــة شـركات
                الطـيـران</label></div>
        <!-- Table -->
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">اسـم الشـركة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">البريد الالكتروني
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">رقـم الهاتـف
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 18px; width: 200px; color: white;background-color: #64AEF7">خــيــارات
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
            @foreach($flightCompanies as $flightCompany)
                <tr>
                    <td>{{$flightCompany->name}}</td>
                    <td>{{$flightCompany->email}}</td>
                    <td>{{$flightCompany->phone_number}}</td>
                    <td>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="man-room.php">
                                    <button type="button" class="btn btn-danger">حذف</button>
                                </a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{route('Flights.edit',$flightCompany->id)}}">
                                 <button type="button" class="btn btn-warning">تعديل</button>
                                </a>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <br>
@endsection