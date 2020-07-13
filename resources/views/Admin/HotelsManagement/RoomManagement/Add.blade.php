@extends('Layouts/Admin_app')

@section('title')
    إضافة غـرفـة جـديـدة
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
            background-image: url("{{asset('images/hotel.jpg')}}");
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
<div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;إضـافـة غـرفـة جـديـدة</label></div>
<br>
<br>
<br>

<form action="{{route('StoreRoom.store',$hotel->id)}}" method="POST">
    {{csrf_field()}}
    <div class="container">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-list" style="color: orange;"></span>&nbsp;امـلأ الـنـمـوذج الـتـالــي لإضــافـة  غـرفـة إلـى قـائـمـة الـغـرف </label>
            <hr>
            <br>
            <br>
            <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                <div class="form-group ">
                    <label for="usr">الاسم</label>
                    <input type="text" class="form-control" name="name" id="usr" placeholder="أدخــل اســم الـغرفة" style="font-size: 20px; color: black;">
                </div>
                <div class="form-group ">
                    <label for="usr">النوع</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">اختر النوع</option>
                        @foreach($roomTypes as $roomType)
                            <?php $roomType ?>
                        <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                            @endforeach
                    </select>

                </div>
                <div class="form-group ">
                    <label for="usr">عـدد الاشخاص</label>
                    <input type="number" class="form-control" name="custcount" id="usr" placeholder="عـدد الاشخاص" style="font-size: 20px; color: black;">
                </div>
                <div class="form-group ">
                    <label for="usr">تكلفة الليلة</label>
                    <input type="text" class="form-control" name="price" id="usr" placeholder="تكلفة الليلة" style="font-size: 20px; color: black;">
                </div>
                <div class="form-group ">
                    <label for="usr">التفاصيل</label>
                    <input type="text" class="form-control" name="about" id="usr" placeholder="أدخـل  مزايا تتمتع بها الغرفة" style="font-size: 20px; color: black;">
                </div>
                <div class="form-group">
                    <input type="checkbox" class="switch-input"  name="available"  />
                    <label class="form-check-label" for="exampleCheck1">الغرفة متاحة</label>
                </div>
                <br>
                <button type="submit" class="btn btn-info" name="btnsave" style="color: white; width: 100px;height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;حــفــظ</button>

            </div>
        </div>
    </div>
</form>
<br>
<br>
@endsection