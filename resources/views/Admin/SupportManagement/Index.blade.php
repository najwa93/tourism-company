@extends('Layouts/Admin_app')
@section('title')
    إدارة الرسـائل
@endsection
@section('styles')

    .p1{
    background-image:
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
<div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-envelope" style="color: orange;"></span>&nbsp;إدارة الرسـائل</label></div>
<br>
<div class="container">
    <br>
    <br>
    <div  style="text-align: center; color:#64AEF7; font-size: 28px;"><label>&nbsp;&nbsp;قــائـــمـــة   الـرســائـل</label></div>
    <!-- Table --><br>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;"></td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">البريد الإلكتروني</td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">التاريخ والوقت</td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الحالة</td>
            <td  class="text-center col-xs-4" style="font-size: 18px; color: white;background-color: #64AEF7">خــيــارات</td>

        </tr>
        </thead>
        <tbody  style="text-align: center;"  dir="ltr">
        @foreach($messages as $message)
        <tr>
            <td><i class="fas fa-envelope{{is_null($message->read_at?'':'o')}} fa-2x"></i></td>
            <td>{{$message->data['email']}}</td>
            <td>{{$message->created_at}}</td>
            <td>{{$message->read_at}}</td>
           {{-- @if($message->user->is_read == 0)
            <td>{{$message->user->is_read = "غيرمقروءة"}}</td>
            @else
                <td>{{$message->user->is_read = "مقروءة"}}</td>
            @endif--}}
            <td>

                    <div class="btn-group" role="group">
                        <a href=""><button type="button" class="btn btn-danger">حذف</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href=""><button type="button" class="btn btn-success">عرض الرسالة كتقييم</button></a>
                        <a href="{{route('Support.show',$message->id)}}"><button type="button" class="btn btn-primary">قراءة الرسالة</button></a>
                    </div>

            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
<br><hr>
<div class="container">
    <div  style="text-align: center; color:#64AEF7; font-size: 28px;"><label>&nbsp;&nbsp;قــائـــمـــة   الـمشـتـركيـن</label></div>
    <!-- Table --><br>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>

            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">البريد الإلكتروني</td>

            <td  class="text-center col-xs-4" style="font-size: 18px; color: white;background-color: #64AEF7">خــيــارات</td>

        </tr>
        </thead>
        <tbody  style="text-align: center;"  dir="ltr">
        <tr>
            <td></td>
            <td>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href=".php">  <button type="button" class="btn btn-danger">حذف</button></a>
                    </div>
            </td>
        </tr>
        </tbody>
    </table>
</div><br><hr><br>
<div class="well"  style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-envelope" style="color: orange;"></span>&nbsp;&nbsp;إرسال بـريد إلكترونـي لجميع مستخدمي الموقع </div><br>
<div class="container">
    <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
        <label for="usr">إرسـال رسـالـة  لجمـيـع المسـتخدمين</label>
        <br>
        <textarea class="form-control" placeholder="أدخــل  الرسـالـة " style="text-align: right; font-size:20px; " rows="4">
    </textarea>
        <br>
        <button type="button" class="btn btn-info" style="color: white; width: 100px;height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-send" style="color: orange;"></span>&nbsp;إرسـال</button>
        <a href="man-support.php"><button type="button" class="btn btn-info" style="color: white; width: 100px;height: 40px; font-size: 20px;">  إلـغاء</button></a>
    </div>
</div>
<br><br>
    @endsection