@extends('Layouts/Admin_app')
@section('title')
   إدارة المستخدمين
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
            background-image: url("{{asset('images/users.jpg')}}");
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
<div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;إدارة المسـتخدميـن</label></div>
<div class="container">
    <br>
    <div class="row">
        <div  class="col-md-4 col-xs-12" style="float: right;">
            <label style=" font-size: 24px; color:#64AEF7; font-weight: bold; "><span class="glyphicon glyphicon-search" style="color: orange;"></span>&nbsp;&nbsp; الــبـحـث بـاســم المستخدم</label>
        </div>

        <div class="col-md-8 col-xs-12">
            <input  type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="الـبـحـث بـاسـم الـمسـتخـدم ..."  style="text-align: right;">
        </div>
    </div>
    <hr>
    <br>
    <div  style="text-align: center; color:#64AEF7; font-size: 28px;"><label>&nbsp;&nbsp;قــائـــمـــة  المسـتخدمين</label></div>
    <!-- Table -->
    <table class="table table-striped table-bordered" id="myTable">

        <tr class="header">
            <th  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">اســم المستخدم</th>
            <th  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الاسم الأول</th>
            <th  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الاسم الأخير</th>
            <th  class="text-center col-xs-4" style="font-size: 18px;width: 200px; color: white; background-color: #64AEF7;">الصلاحيات</th>
            <th  class="text-center col-xs-6" style="font-size: 18px; color: white;background-color: #64AEF7">خــيــارات</th>

        </tr>
        <tbody  style="text-align: center;"  dir="ltr">
        @foreach($users_data as $user)
        <tr>
            <td>{{$user['user_name']}}</td>
            <td>{{$user['first_name']}}</td>
            <td>{{$user['last_name']}}</td>
            <td>{{$user['role']}}</td>
            <td>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="{{route('Users.show',$user['user_id'])}}"><button type="button" class="btn btn-warning">بيانات المستخدم</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{route('Users.edit',$user['user_id'])}}">  <button type="button" class="btn btn-success">إدارة  صلاحيات المستخدم</button></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    @endsection