@extends('Layouts/Admin_app')
@section('title')
    تفاصـيل الرسـالة
@endsection
@section('styles')

    .p1{
    background-image: url("{{asset('images/message1.jpg')}}");
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

    label{
      margin-bottom:20px;
    }
    @endsection


@section('content')
<div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-envelope" style="color: orange;"></span>&nbsp;تفاصـيل الرسـالة</label></div>
<br>
<div class="well"  style="font-size: 25px; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-comment" style="color: orange;"></span>&nbsp;تـفاصـيل الرسـالة</div>
<div class="container">
    <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">

        <label for="usr" style="color: #263859;">البريد الالكتروني :</label>
        <span>{{$message->user->email}}</span>

        <br>
        <label for="usr" style="color: #263859;">التـاريخ والوقـت  :</label>
        <span>{{$message->user->created_at}}</span>
        <br>
        <label for="usr" style="color: #263859;">الرسـالة :</label>
        <span>{{$message->user->message->message}}</span>
        <br><br>
        <label for="usr">الرد على الرسـالة :</label>
        <br>
        <textarea class="form-control" placeholder="أدخــل  رد على الرسالة " style="text-align: right; font-size:20px; color: black;" rows="4">
    </textarea>
        <br><br>
        <button type="button" class="btn btn-info" style="color: white; width: 100px;height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-send" style="color: orange;"></span>&nbsp;رد</button>
        <a href="man-support.php"><button type="button" class="btn btn-info" style="color: white; width: 100px;height: 40px; font-size: 20px;">  إلـغاء</button></a>
    </div>
</div>
@endsection