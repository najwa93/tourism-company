@extends('Layouts.Web_app')
   @section('styles')

        .p1{
            background-image:url('{{asset("images/Dubai.jpg")}}');
            background-size:cover;
            height:600px;
            overflow-y: auto;
            overflow-x: auto;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
        }
        .p2{
            padding-top: 5px;
            font-family: Arial;
            font-style:italic;
            font-size: 38px;
            color:#64AEF7;
            font-weight: bold;
        }

   @endsection


@section('content')
{{--<form action="index.php" method="POST">
    <div class="modal fade" id="myModal" role="dialog" style="margin-top: 40px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #64AEF7; color: white; height: 60px;">
                    <button type="button" class="close" data-dismiss="modal" style="float: left;text-align: left;">X</button>
                    <center><label style="font-size: 26px; margin-top: -5px;">تسـجيل الدخـول</label></center>
                </div>

                <form class="form-group" >
                    <div class="row">
                        <div class="modal-body col-md-6 col-xs-12" style=" float: right;padding-right: 22px; padding-left: 22px;">
                            <label>اسـم المسـتخدم:</label><br>
                            <input type="text" name="username" class="form-control" placeholder="ادخـل اسـم المسـتخدم">
                            <label>كلمـة المرور:</label><br>
                            <input type="password" name="pw" class="form-control" placeholder="ادخل كلمـة المرور">
                            <input type="submit" name="btnlogin" value="تسـجيل الدخول" class="btn btn-info" style="color: white; width: 100px; font-size: 16px;margin-top: 6px;">
                            <a href="index.php"><button type="button" class="btn btn-warning" style="color: white; width: 100px;font-size: 16px; margin-top: 6px;">إلـغـاء</button></a>

                        </div>
                </form>
                <div class="col-md-6 col-xs-12" style="float: right; padding-right: 30px;"> <img src="image/login1.png"  alt="human" style="width:200px;height: 200px;"></div>
            </div>   </form>
<hr>
<div style="font-size: 15px; padding-bottom: 10px;padding-right: 10px;padding-top: -5px;" > <i class="glyphicon glyphicon-warning-sign" style="color: red;"></i>اذا لم  تنشئ حساب لدينا  <a href="create-account.php"> اضغط هنا</a></div>
</div>
</div>
</div>

--}}
<div class ="p1">
    <center>
        <div class="p2">
            <h1>مرحبا بضيوف ترافل رو</h1>
            <h3>اختر المدينة واحــجز الفنـــدق وتــذكرة الطـــيران واحصل على أقــــوى عــــروض السفر <br>والسياحة حول العالم من خلال موقع ترافل  رو </h3>
        </div><br>
        <div class="container">
            <div class="tab row">
                <button class="tablinks col-md-4 col-xs-12 active" onclick="openCity(event, 'hotel')"><span class="glyphicon glyphicon-bed" style="color: orange;"></span>&nbsp;&nbsp;الفنادق</button>
                <button class="tablinks col-md-4 col-xs-12" onclick="openCity(event, 'flight')"><span class="glyphicon glyphicon-plane" style="color: orange;"></span>&nbsp;&nbsp;رحلات الطيران</button>
                <button class="tablinks col-md-4 col-xs-12" onclick="openCity(event, 'offer')"><span class="glyphicon glyphicon-gift" style="color: orange;"></span>&nbsp;&nbsp;العروض السياحية</button>
            </div>

            <!-- Search Hotels Section  -->
            <form method="get" action="{{route('searchHotels')}}">
                {{csrf_field()}}
              <div id="hotel" class="tabcontent row" style="display: all;">
                <div style="text-align: right;">
                    <label style="color:#64AEF7;"><span class="glyphicon glyphicon-map-marker" style="color: orange;"></span>البحـث باسـم المـدينة</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="ادخـل اسـم المدينة...">
                </div><br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-calendar" style="color: orange;"></span>&nbsp;تاريـخ الوصـول</label><br>
                        <input type="date" class="form-control" name="checkin" id="checkin" placeholder="تاريخ الوصولس" >
                    </div>
                    <div class="col-md-6 col-xs-12"  style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-calendar" style="color: orange;"></span>&nbsp;تاريـخ  المغادرة </label><br>
                        <input type="date" class="form-control" name="checkout" id="checkout" placeholder="تـاريخ المغادرة">
                    </div></div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-lamp" style="color: orange;"></span>&nbsp;عـدد الليالـي  </label>
                        <input type="number" class="form-control" id="nights_count" min="1" max="100" placeholder="ادخـل  عـدد الليـالـي ..">
                    </div>
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-user"  style="color: orange;"></span>&nbsp;عـدد الأشـخاص  </label>
                        <input type="number" class="form-control" id="customers_count" min="1" max="100" name="customers_count" placeholder="ادخـل  عـدد المسـافرين ..">
                    </div></div>
                <button type="submit" class="btn btn-info" style="color: white; width: 120px;height: 35px; font-size: 20px; margin-top: 10px;"><span class="glyphicon glyphicon-search" style="color: orange;"></span>&nbsp;بـحـث</button><br>
            </div>
            </form>

            <!-- Search Flights Section  -->
            <form method="get" action="{{route('searchFlights')}}">
                {{csrf_field()}}
               <div id="flight" class="tabcontent row" style="display: none;">
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-arrow-up" style="color: orange;"></span>&nbsp;يسـافر مـن </label><br>
                        <input type="text" class="form-control" id="source_city" name="source_city" placeholder="ادخل مدينـة المصـدر" >
                    </div>
                    <div class="col-md-6 col-xs-12"  style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-arrow-down" style="color: orange;"></span>&nbsp;يسـافر إلـى</label><br>
                        <input type="text" class="form-control" id="destination_city" name="destination_city" placeholder="ادخل مدينة الوجهـة">
                    </div></div><br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-calendar" style="color: orange;"></span>&nbsp;تاريـخ السـفر </label><br>
                        <input type="date" class="form-control" id="date" name="date" placeholder="" >
                    </div>
                    <div class="col-md-6 col-xs-12"  style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;عـدد المسـافريـن</label><br>
                        <input type="number" class="form-control" id="customers_count" name="customers_count" placeholder="ادخل  عدد المسـافرين">
                    </div></div><br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-briefcase" style="color: orange;"></span>&nbsp;درجة الرحلـة </label><br>
                        <select id="flight_degree" name="flight_degree" class="form-control">
                            @foreach($flight_degrees as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-12" style="float: right; padding-top: 33px;">
                        <button type="submit" class="btn btn-info" style="color: white; width: 120px;height: 34px; font-size: 20px; "><span class="glyphicon glyphicon-search" style="color: orange;"></span>&nbsp;بـحـث</button></div></div>
            </div>
            </form>

            <!-- Search Offers Section  -->
            <form method="get" action="{{route('searchOffers')}}">
            <div id="offer" class="tabcontent row" style="display: none;">
                <div class="row">
                    <div  class="col-md-4 col-xs-12" style="float: right;">
                        <label style=" font-size: 22px; color:#64AEF7; font-weight: bold; "><span class="glyphicon glyphicon-search" style="color: orange;"></span>&nbsp;&nbsp; الــبـحـث بـاســم  الـمـديـنــة</label>
                    </div>

                    <div class="col-md-8 col-xs-12">
                        <input  type="text" class="form-control" name="dest_city" id="myInput" onkeyup="myFunction()" placeholder="الـبـحـث بـاسـم المدينـة...."  style="text-align: right;">
                    </div>
                    <div class="col-md-6 col-xs-12" style="float: right; padding-top: 33px;">
                        <button type="submit" class="btn btn-info" style="color: white; width: 120px;height: 34px; font-size: 20px; "><span class="glyphicon glyphicon-search" style="color: orange;"></span>&nbsp;بـحـث</button></div></div>
            </div>
            </form>
             {{--   <table id="myTable" class="table-responsive">
                    <tr class="header">
                        <th style="width:20%;">البـلـد</th>
                        <th style="width:20%;">المـدينـة</th>
                        <th style="width:20%;">تـاريخ الرحـلـة</th>
                        <th style="width:30%;"></th>
                    </tr>
                    <tr>
                        <td>سوريا</td>
                        <td>دمشق</td>
                        <td>9 اب 2020</td>

                        <td>   <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning">التفاصيل</button>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>سوريا</td>
                        <td>اللاذقية</td>
                        <td>9 ايلول 2020</td>

                        <td>   <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning">التفاصيل</button>
                                </div>
                            </div>
                        </td>

                    </tr>
                </table>--}}
            </div>
        </div>

</div>
</center>
</div>

<!-- Wrapper for slides -->
<!--<div>
  <img class="la" src="image/latravel1.jpg" width="100%" alt="latravel1">
</div>
     <section
class="main" style="background:url(image/latravel1.jpg.jpg); )
no-repeat top center; background-size:cover; ">
<div
class="la" ng-show="showTabs"><h1>مرحبا بضيوف ترافل يلا</h1><h3>احــجز الفنـــدق وتــذكرة الطـــيران والســيارة المناسبة لك واحصل علي أقــــوي عــــروض السفر <br>والسياحة حول العالم من خلال موقع ترافل يلا</h3></div><div
data-abide-error class="alert callout" style="display: none;"><p><i
class="fa fa-exclamation" aria-hidden="true"></i> يوجد خطأ في بياناتك.</p></div><div
class="row"><ul
class="tabs"  ng-show="showTabs" data-active-collapse="true" data-tabs id="collapsing-tabs"><li
class="tabs-title  is-active ">
<a
href="#Hotel" aria-selected="true">
<i
class="hotel_icn"></i>
حجز فنادق
</a></li><li
class="tabs-title">
<a
href="#airlineTickets">
<i
class="flight_icn"></i>
رحلات طيران
</a></li><li
class="tabs-title packagesBtn" >
<a
href="#hotelsAndFlights">
<i
class="packages_icn"></i>
<span>فنادق</span>
<span>+ طيران</span>
</a></li><li
class="tabs-title">
<a
href="#cars">
<i
class="car_icn"></i>
إيجار سيارات
</a></li></ul> </div>-->
<!-- Left and right controls -->
<br>
<center>

    <div class="well" style="background-color:#64AEF7; ">
        <div class="container">
            <div  class="col-md-6 col-xs-12" style="float:right;">
                <label style=" font-size: 25px; color:white; font-weight: bold; ">سـجـل مـعـنـا لـتـصـلـك عـروضـنـا</label>
            </div>

            <div class="col-md-6 col-xs-12" dir="ltr" style="padding-left: 20px;">
                <div class="input-group">
          <span class="input-group-btn">
        <button class="btn btn-default " type="button" style=" font-weight: bold;color:#64AEF7;">اشــتـراك   &nbsp; <span class="glyphicon glyphicon-ok" style="color: orange;"></span></button>
      </span>
                    <input type="text" class="form-control" placeholder="أدخل بريدك الإلكتروني " style="text-align: right; font-size: 18px;">
                </div>
            </div>
        </div>
    </div>
    <!--   <input type="submit" name="" style="color: white; background-color: rgb(10,20,150) ; width: 200px; height: 35px; border:1px normal orange; border-radius:4px; " value="أدخل بريدك الإلكتروني">

   <input style="width: 250px; text-align:right;"  placeholder="بريدك الإلكتروني" ;  type="email" name="">
     <span style="color:rgb(10,10,100) ;">سجل معنا لتصلك عروضنا  </span>
   </div>-->
</center><br>

<div style="text-align: center; margin-bottom:-10px; color: #64AEF7">
    <h1 > المزايا التي يتمتع بها موقع ترافل رو</h1><br>
</div>
<div class="container cc" style="text-align:right; font-size: 20px;">
    <div class="row" style="color: #64AEF7;">
        <div class="col-md-4 col-xs-12" style=" border: 1px solid white; background-color:rgba(8,6,5,0.05); float: right;">
            <h2><span class="glyphicon glyphicon-plane" style="color: orange;"></span>&nbsp;رحلات طيران منافسة </h2>
            <p >احجز تذكرة الطيران الخاصة بك بسهولة لجميع الخطوط الجوية لجميع أنحاء العالم</p>
        </div>
        <div class="col-md-4 col-xs-12" style=" border: 1px solid white; background-color: rgba(8,6,5,0.05); float: right;">
            <h2><span class="glyphicon glyphicon-cutlery" style="color: orange;"></span>&nbsp;أفضل فنادق العالم </h2>
            <p >نوفر لك أفضل الأسعار لأكثر الفنادق حول العالم  وذات رفاهية عالية</p>
        </div>
        <div class="col-md-4 col-xs-12" style=" border: 1px solid white; background-color:rgba(8,6,5,0.05);">
            <h2><span class="glyphicon glyphicon-gift" style="color: orange;"></span>&nbsp;عروض سياحية مميزة </h2>
            <p>تأمين كافـة الوسائل  التي تساعدك في قضاء رحلة  ممتعة وبأسعار مناسبة</p>
        </div>
    </div>

</div>

<br>
<br>

<div  style="text-align:center;">
    <a class="btn" style=" font-size: 24px;  color: white; width: 250px;
  background-color:#64AEF7 ;"><span class="glyphicon glyphicon-globe" style="color:orange;"></span>&nbsp;دول ننصحك بزيارتها  </a>
</div>
<br>
<div class="container">
    <div class="row " >
        <div class="col-md-4 col-xs-12 hh"style="background-image: url('{{asset("images/syria.jpg")}}'); background-size: cover; height: 230px; float: right;border:">
            <a class="btn btn-info"> سـوريا</a>
        </div>

        <div class="col-md-4 col-xs-12 hh" style="background-image: url('{{asset("images/Dubai.jpg")}}'); background-size: cover; height: 230px; float: right;">
            <a class="btn btn-info">دبي</a>
        </div>
        <div class="col-md-4 col-xs-12 hh img-rounded" style="background-image:url('{{asset("images/Italy.jpg")}}'); background-size: cover; height:230px;">
            <a class="btn btn-info">إيطاليا</a>
        </div>
    </div>
    <br>
</div>
<br>

<!---
<div style="text-align:right; ">
 <a class="btn" style=" font-size: 24px;  color: white;
  background-color:blue;  padding-right:20px;  padding-left: 60px;margin: 10px;  margin-right: 90px;">حجز رحلات الطيران  &nbsp; <i  class="glyphicon glyphicon-plane"></i></a><br>
<p style="font-size: 22px; padding-right: 90px;">يمكنكم الاستفادة من نظام حجوزات الطيران الخاصة بنا وحجز المقاعد  في رحلة مباشرة عبر النقر على الزر التالي   <br>
  <a href="" class="btn btn-info" style="">رحلات  الطيران</a></p>
</div>
<br>
<br>
<div style="text-align:right; ">
 <a class="btn" style=" font-size: 24px;  color: white;
  background-color:blue;  padding-right:20px;  padding-left:60px; margin: 10px; margin-right: 90px;">العروض السياحية  &nbsp; <i  class="glyphicon glyphicon-gift"></i></a><br>
<p style="font-size: 22px; padding-right: 90px;">نسعد بأن نقدم لكم  حزمة سياحية متكاملة تتضمن رحلتي الذهاب والإياب  مع حجز في أجمل الفنادق في المدينة المسافر إليها وكل  ذلك بسعر مناسب<br></p>
<table class="table table-bordered table-striped table-hover" style="width: 1260px;">
  <tr>
    <td class="text-center bg-primary" style="font-size: 18px;"></td>
    <td class="text-center bg-primary" style="font-size: 18px;">السعر الجديد</td>
    <td class="text-center bg-primary" style="font-size: 18px;">السعر القديم</td>
    <td class="text-center bg-primary" style="font-size: 18px;">مدة الرحلة</td>
    <td class="text-center bg-primary" style="font-size: 18px;">تاريخ الرحلة</td>
    <td class="text-center bg-primary" style="font-size: 18px;">المدينة</td>
    <td class="text-center bg-primary" style="font-size: 18px;">البلد</td>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>-->

<div class="container">
    <div style="text-align: center; margin-bottom:-10px; color: #64AEF7">
        <h1>تـقـيـيـم الـمـسـتـخـدمـيـن</h1><br>
    </div>  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color:#64AEF7;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="0"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="height: 200px; ">
            <div class="item active">
                <p>موقع رائع يتيح  حجز الفنادق وتذاكر الطيران أون لاين بسهولة</p>
                <h3>"أحمد مصطفى"</h3>
            </div>

            <div class="item">
                <p>شكراً لتوفير هكذا موقع لأنه يوفّر الكثير من الجهد عن طريق الحجز مباشرة  من المنزل</p>
                <h3>"فاطمة الحامد"</h3>
            </div>

            <div class="item">
                <h3>موقع رائع وسهل الاستخدام يقدم أجمل العروض السياحية </h3>
                <p>"علي ياسيين"</p>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-left" style="color: orange;"></span>
            <span class="sr-only">Next</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-right" style="color: orange;"></span>
            <span class="sr-only">Previous</span>
        </a>
    </div>
</div>
<br>
<br>
<br>
<!--contact-->
<div class="container contact-form" id="contact">

    <div style="text-align: center; font-weight: bold; color: #64AEF7; font-size: 25px;">
        <span>تــواصـــل مــعــنـــا</span><br>
    </div>
    <hr>
    <form method="post" action="{{route('sendMessage')}}">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <div>
                <h3 style="text-align: right;">اسم المستخدم</h3>
                <input style="text-align: right;" id="name" type="text" name="name" class="form-control" placeholder="الاسم">
            </div>
            <div>
                <h3 style="text-align: right;">البريد الإلكتروني</h3>
                <input style="text-align: right;" id="" type="text" name="email" class="form-control" placeholder=" البريد الالكتروني">
            </div>
            <br>
            <div>
                <textarea class="form-control" name="message" style="text-align: right; resize: none;" rows="4"></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block" style="font-size: 18px;">
                    <span class="glyphicon glyphicon-send" style="color: orange;"></span>&nbsp;إرسال
                </button>
            </div>
        </div>



        <div class="col-md-6 col-xs-12" style="text-align: center; float: right;">
            <h2>أرقام الاتصال</h2>
            <h3><span class="glyphicon glyphicon-phone" style="color: orange;"></span>6677889911 963+ </h3>
            <h3><span class="glyphicon glyphicon-phone" style="color: orange;"></span>2233445566 963+ </h3>
            <hr>
            <h2>البريد الإلكتروني</h2>
            <h3><span class="glyphicon glyphicon-envelope" style="color: orange;"></span>&nbsp;TravelRo@Email.com</h3>
            <hr>
            <h3>تابعنا عبر مواقع التواصل الاجتماعي</h3>
             <div class="social-icon">
               <i class="fa fa-twitter twitter"></i>
               <i class="fa fa-facebook fb"></i>
             <i class="fa fa-google google"></i>
           </div>
        </div>
    </div>
    </form>
</div>
<br>
</div>
@endsection

@include('Partials.Web._javascript')