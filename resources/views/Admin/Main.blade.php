@extends('Layouts/Admin_app')


@section('content')
<div class="well"  style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-king" style="color: orange;"></span>&nbsp; خـيارات المـديـر</div>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class=" col-md-4 col-xs-12"  style="float: right;"><a href="man-globe.php"><button class="btn success"><span class="glyphicon glyphicon-globe"></span><br>إدارة البلدان</button></a></div>
        <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-hotel.php"><button class="btn warning"><span class="glyphicon glyphicon-cutlery"></span><br>إدارة الفنادق</button></a></div>
        <div class=" col-md-4 col-xs-12"  style="float: right;"><a href="man-flights.php"><button class="btn info"><span class="glyphicon glyphicon-plane"></span><br>إدارة الرحلات الجوية</button></a></div>

        <br>
    </div>
    <br>
    <div class="row">
        <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-users.php"><button class="btn info"><span class="glyphicon glyphicon-user"></span><br>إدارة المستخدمين</button></a></div>
        <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-offer.php"><button class="btn success"><span class="glyphicon glyphicon-gift"></span><br>العروض السياحية</button></a></div>
        <div class=" col-md-4 col-xs-12" style="float: right;"><a href="man-support.php"><button class="btn danger"><span class="glyphicon glyphicon-envelope"></span><br>الرسـائل</button></a></div>
        <br>
    </div>
    <br>
    <br>
</div>
</div>

    @endsection