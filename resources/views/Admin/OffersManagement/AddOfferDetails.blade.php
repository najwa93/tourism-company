@extends('Layouts/Admin_app')
@section('title')
    إضـافة عـرض سـياحـي
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
    background-image: url("{{asset('images/offer-travel.jpg')}}");
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
                    class="glyphicon glyphicon-gift" style="color: orange;"></span>&nbsp;إضـافة عرض سـياحـي</label>
    </div>
    <br>
    <div class="well" style="font-size: 30px;font-weight: bold; color: #64AEF7; text-align: center;"><span
                class="glyphicon glyphicon-plane" style="color: orange;"></span>&nbsp;الرحـلـة
    </div><br>

    <div class="container" style="font-size: 18px;">
        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>رحـلـة الذهـاب</label></div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td></td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">من المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">إلى المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">التاريخ
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">الوقت
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">شركة الطيران
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد اقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد السياحية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة الاقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة السياحية
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
            <tr>
                @foreach($allData as $value)
                    <td><input type="radio" name="optradio1"></td>

                    <td>{{$value['source_city']}}</td>
                    <td>{{$value['destination_city']}}</td>
                    <td>{{$value['date']}}</td>
                    <td>{{$value['updated_time']}}</td>
                    <td>{{$value['flight_company']}}</td>
                    <td>{{$value['economy_seats_count']}}</td>
                    <td>{{$value['first_class_seats_count']}}</td>
                    <td>{{$value['economy_ticket_price']}}</td>
                    <td>{{$value['first_class_ticket_price']}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <hr>
        <br>

        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>رحـلـة العـودة</label></div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td></td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">من المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">إلى المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">التاريخ
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">الوقت
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">شركة الطيران
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد اقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">عدد المقاعد السياحية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة الاقتصادية
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">سعرالتذكرة السياحية
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
            <tr>
                <td><input type="radio" name="optradio1"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="radio" name="optradio1"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            </tbody>
        </table>
        <br>
        <hr>
        <br>
        <div class="row" style="font-size: 25px;">
            <div class="col-md-6 col-xs-12" style="float: right;">
                <label style="color:#64AEF7;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;عـدد
                    المقاعـد</label><br>
                <input type="number" class="form-control" id="usrname" placeholder="ادخل  عدد المقاعـد">
            </div>
            <div class="col-md-6 col-xs-12" style="float: right;">
                <label style="color:#64AEF7;"><span class="glyphicon glyphicon-briefcase" style="color: orange;"></span>&nbsp;درجة
                    الرحلـة </label><br>
                <select id="country" name="country" class="form-control">
                    <option value="tour">الدرجة السياحية</option>
                    <option value="">الدرجة الاقتصـادية</option>
                </select>
            </div>
        </div>
        <br><br><br></div>
    <div class="well" style="font-size: 30px;font-weight: bold; color: #64AEF7; text-align: center;"><span
                class="glyphicon glyphicon-lamp" style="color: orange;"></span>&nbsp;الفنـدق
    </div><br>
    <div class="container" style="font-size: 18px;">

        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>قـائـمـة الفـنـادق</label></div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td></td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">الفندق
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">البلد
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">اسم الغرفة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">النوع
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">عدد الاشخاص
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">تكلفة الليلة
                </td>
            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
            <tr>
                <td><input type="radio" name="optradio1"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td><input type="radio" name="optradio1"></td>
            <tr>
                <td><input type="radio" name="optradio1"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            </tr>

            </tbody>
        </table>
        <br>
        <hr>
        <br>
    </div>
    <div class="well" style="font-size: 30px;font-weight: bold; color: #64AEF7; text-align: center;"><span
                class="glyphicon glyphicon-gift" style="color: orange;"></span>&nbsp;الـعـرض
    </div><br>
    <div class="container" style="font-size: 18px;">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                <div class="form-group ">
                    <label for="usr">عدد المسافرين</label>
                    <input type="number" class="form-control" id="usr" placeholder="أدخــل  عدد المسافرين"
                           style="font-size: 20px; color: black;">
                </div>
                <div class="form-group ">
                    <label for="usr">التفاصيل</label>
                    <textarea class="form-control" placeholder="تفاصيل العرض"
                              style="text-align: right; font-size:20px; color: black;" rows="4"></textarea>
                </div>
                <button type="button" class="btn btn-info"
                        style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                            class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;حــفــظ
                </button>

            </div>
        </div>
    </div>
    <br>
@endsection