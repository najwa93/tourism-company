    @extends('Layouts/Admin_app')
    @section('title')
        إدارة صلاحيات المستخدم
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
    <div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;إدارة صـلاحيات المسـتخدم</label></div>
    <br>
    <div class="well"  style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-king" style="color: orange;"></span>&nbsp; صـلاحيـات  المسـتخدم</div>
    <form method="post" action="{{route('Users.update',$user->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="container" style="color: #64AEF7; font-size: 20px;">
        <br>
        <div class="row">
            <div  class="col-md-4 col-xs-12" style="float: right; color: #64AEF7;">
                <select id="role" name="role" class="form-control">
                    <option value="">اختر الصلاحية</option>
                    @foreach($roles as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-6 col-xs-12" style="float: left;">
                <button type="submit" class="btn btn-info btn-block" style="color: white; font-size: 18px;font-weight: bold; height: 35px;"><span class="glyphicon glyphicon-saved" style="color: orange;"></span>&nbsp;إضــافـة</button>
            </div>
        </div><hr>
        <label style=" font-size: 25px;
        color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-list" style="color: orange;"></span>&nbsp;صـلاحيات المسـتخدم الحالية :</label>
        <table id="myTable" class="table table-striped table-bordered" style="text-align: center;">
            <tr class="header">
                <th  style="font-size: 18px; color: white; background-color: #64AEF7; font-size: 22px; text-align: center;">الصـلاحية</th>
              {{--  <th  style="font-size: 18px; color: white; background-color: #64AEF7; font-size: 22px; text-align: center;">إزالة المستخدم من الدور</th>--}}
            </tr>
            <tr>
                <td>{{$userRole}}</td>
                {{--<td><button><span class="glyphicon glyphicon-remove-circle" style="color: orange;"></span></button></td>--}}
            </tr>

        </table>
    </div><br><br>
    </form>
    @endsection