    @extends('Layouts/Admin_app')
    @section('title')
        بيانات المستخدم
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

        .table tr th{
        font-size:20px;
        color: #FFA500;
        text-align:center;
        }

        .table tr td{
        text-align:center;
        font-size:16px;
        color: #263859;
        font-weight:bold;
        }
    @endsection

    @section('content')
        <div class="p1"><label
                    style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span
                        class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;بيانات المسـتخدم</label></div>
        <br>
        <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span
                    class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp; معلـومـات المسـتخدم
        </div>
        <div class="container" style="color: #64AEF7; font-size: 20px;">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">الاسم الأول</th>
                    <th scope="col">الاسم الأخير</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">البلد</th>
                    <th scope="col">الجنس</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">صلاحيات المستخدم</th>
                    <th scope="col">تاريخ ووقت إنشاء الحساب</th>
                    <th scope="col">الرصيد</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$user_data['user_name']}}</td>
                    <td>{{$user_data['first_name']}}</td>
                    <td>{{$user_data['last_name']}}</td>
                    <td>{{$user_data['email']}}</td>
                    <td>{{$user_data['country']}}</td>
                    <td>{{$user_data['gender']}}</td>
                    <td>{{$user_data['phone_number']}}</td>
                   <td>{{$user_data['role']}}</td>
                    <td>{{$user_data['created_at']}}</td>
                    <td>{{$user_data['credit']}}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            {{-- <label>اسـم المسـتخدم:</label>
             <label>الاسـم الأول:</label><hr>
             <label>الاسـم الاخير:</label><hr>
             <label>البريد الالكتروني:</label><hr>
             <label>البلد:</label><hr>
             <label>الجنس:</label><hr>
             <label>رقـم الهاتف:</label><hr>
             <label>صلاحيات المستخدم:</label><hr>
             <label>تاريخ ووقت انشاء الحساب:</label><hr>
             <label>الرصـيد</label><br><br>--}}
        </div>
    @endsection