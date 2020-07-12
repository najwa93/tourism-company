@extends('Layouts/Admin_app')

@section('title')
    إدارةغـرف الفنـادق
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
<div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-cutlery" style="color: orange;"></span>&nbsp;إدارة غـرف الـفـنادق</label></div>
<br> <br>
<div class="well"  style="font-size: 25px; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-bed" style="color: orange;"></span>&nbsp;{{$hotel->name}}</div>
<div class="container">
    <a  href="{{route('GetRoom.create',$hotel->id)}}" style="text-decoration:none ;"> <button type="button" class="btn btn-block" style="background-color:#64AEF7; color: white; height: 40px; font-size: 22px; font-weight: bold;"><span class="glyphicon glyphicon-plus" style="color: orange;"></span>&nbsp;&nbsp;إضــافــة  غـرفــة  جــديــدة</button> </a>
    <br><br>
    <div  style="text-align: center; color:#64AEF7; font-size: 28px;"><label><span class="glyphicon glyphicon-lamp" style="color: orange;"></span>&nbsp;&nbsp;الـغـرف الـمـتـوفــرة</label></div>
    <!-- Table -->
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td  class="text-center" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الاســم </td>
            <td  class="text-center" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">النـوع</td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">عـدد الأشـخاص</td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">التـفـاصـيل</td>
            <td  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الـتـكـلـفة</td>
            <td class="text-center col-xs-4" style="font-size: 18px;width: 300px; color: white;background-color: #64AEF7">خــيــارات</td>

        </tr>
        </thead>
        <tbody  style="text-align: center;"  dir="ltr">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-warning">تعديل</button>
                    </div>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
</div>
<br>
@endsection