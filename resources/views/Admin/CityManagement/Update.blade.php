@extends('Layouts/Admin_app')
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
    background-image: url("{{asset('images/globe.jpg')}}");
    width: 100%;
    height: 300px;
    background-size:cover;
    overflow-y: auto;
    overflow-x: auto;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: -1px;
    opacity: 0.9;
    }
@endsection


<form action="{{route('Cities.update',$city->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('PUT')
    <div class="p1"><label
                style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span
                    class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;إضـافـة مـديـنـة
            جـديـدة</label></div>
    <br>
    <br>
    <div class="container">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-download" style="color: orange;"></span>&nbsp;أضــف
                مـديــنــة إلــى قــائـمـة الــمــدن الـمـتـاحـة</label>
            <br>
            <br>
            <br>

            <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                <div class="form-group ">
                    <label for="usr">اســم الـمـديـنـة</label>
                    <input type="text" class="form-control" name="cityname" placeholder="أدخــل اســم الـمــديــنــة"
                           value="{{$city->name}}" style="font-size: 22px; color: black;">
                </div>
                <div class="form-group ">
                    <label for="usr">عــن الـمـديـنـة</label>
                    <textarea class="form-control" name="aboutcity" placeholder="أدخــل مـعـلـومـات عـن الـمــديـنـة"
                              style="text-align:right;font-size:22px; color: black;" rows="4">
                        {{$city->description}}
                    </textarea>
                </div>
                <div class="form-group ">
                    <label for="usr">مـوقــع الـمـديـنـة</label>
                    <input type="text" class="form-control" name="location" id="usr"
                           placeholder="أدخـل مـوقـع الـمــديــنــة مــن خـرائــط غـوغـل"
                           value="{{$city->city_location}}" style="font-size: 22px; color: black;">
                </div>
                <div class="form-group">
                    <label for="flag">صـور مـن الـمـديـنـة</label>
                    <input id="file-input" type="file" name="images[]" multiple>
                    <div class="panel-body">
                        @foreach($cityImgs as $cityImg)
                            <img src="{{url('/images/'.$cityImg->img_path)}}" style="width: 150px;height: 140px;">
                        @endforeach
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-info" name="btnsave"
                        style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                            class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;تعديل
                </button>

            </div>
        </div>
    </div>
</form>
<br>
<br>

