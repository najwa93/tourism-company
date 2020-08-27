@extends('Layouts.Admin_app')
@section('title')
    إضافة رحلـة طيـران جـديـدة
@endsection
@section('styles')


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
                    class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;إضـافـة رحلة طيـران
            جـديـدة</label></div>
    <br>
    <br>
    <div class="container">

        <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-list" style="color: orange;"></span>&nbsp;امـلأ
            الـنـمـوذج الـتـالــي لإضــافـة رحـلـة إلـى قـائـمـة رحـلات الـطيـران المـتوفرة </label>
        <hr>
        <br>
        <br>
        <form action="{{route('Flights.store')}}" method="POST">
            {{csrf_field()}}
            <div class="col-md-6 col-xs-12" style="float: right;">
                <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                    <div class="form-group ">
                        <label for="usr">مـن المـديـنة </label>
                        <select name="source_city" id="city1" class="form-control">
                            <option value="">اختر مدينة</option>
                            @foreach($cities as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="usr">إلـى المـديـنة </label>
                        <select name="dist_city" id="city2" class="form-control">
                            <option value="">اختر مدينة</option>
                            @foreach($cities as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="usr">شـركـة الطـيران</label>
                        <select name="flight_company" id="filghtcompany" class="form-control">
                            <option value="">اختر شركة طيران</option>
                            @foreach($flightCompanies as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="usr">عـدد مقاعـد الدرجة الاقتصادية</label>
                        <input type="text" class="form-control" id="usr" name="economy_seats_count"
                               placeholder="عـدد مقاعـد الدرجة الاقتصادية" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">عـدد مقاعـد الدرجة السياحية</label>
                        <input type="text" class="form-control" id="usr" name="first_class_seats_count"
                               placeholder="عـدد مقاعـد الدرجة السياحية" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">التاريـخ</label>
                        {{--<input type="date" class="form-control" id="usr" name="date" placeholder="تاريـخ الرحـلـة"
                               style="font-size: 20px; color: black;">--}}
                        <input type="text" class="form-control" id="datepicker" name="datepicker">

                    </div>
                    <div class="form-group ">
                        <label for="usr">الـوقـت</label>
                        <input type="time" class="form-control" id="usr" name="time" placeholder="وقـت الرحـلـة"
                               style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">مـدة الرحـلة</label>
                        <input type="text" class="form-control" id="usr" name="duration" placeholder="مـدة الرحـلة"
                               style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">سعر التذكرة الدرجة الاقتصادية</label>
                        <input type="text" class="form-control" id="usr" name="economy_ticket_price"
                               placeholder="سعر التذكرة الدرجة الاقتصادية" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">سعر التذكرة الدرجة السياحية</label>
                        <input type="text" class="form-control" id="usr" name="first_class_ticket_price"
                               placeholder="سعر التذكرة الدرجة السياحية" style="font-size: 20px; color: black;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info"
                            style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                                class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;إضـافــة
                    </button>

                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
@endsection