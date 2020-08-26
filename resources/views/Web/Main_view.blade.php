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
    @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span style="font-size: 15px;text-align: center;font-weight: bold">{{ $message }}</span>
        </div>
    @endif


<div class ="p1">
    <center>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span style="font-size: 25px;text-align: center;font-weight: bold">{{ $message }}</span>
            </div>
        @endif
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
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" placeholder="ادخـل اسـم المدينة...">
                    @error('city')
                    <div class="alert alert-danger">
                        <span style="font-size: 15px;text-align: center;font-weight: bold">يرجى إدخال اسم المدينة</span>
                    </div>
                    @enderror
                </div><br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-calendar" style="color: orange;" ></span>&nbsp;تاريـخ الوصـول</label><br>

{{--
                        <input type="date" class="form-control" name="checkin" id="checkin" min="25-8-2020" max="01-09-2020" placeholder="تاريخ الوصول" >
--}}
                       <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="تاريخ الوصول">
                        @error('datepicker')
                        <div class="alert alert-danger">
                            <span style="font-size: 15px;text-align: center;font-weight: bold">يرجى إدخال تاريخ الوصول</span>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-xs-12"  style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-calendar" style="color: orange;"></span>&nbsp;تاريـخ  المغادرة </label><br>
                       {{-- <input type="date" class="form-control" name="checkout" id="checkout" placeholder="تـاريخ المغادرة">--}}
                        <input type="text" class="form-control" id="datepicker1" name="datepicker1" placeholder="تاريخ المغادرة">
                        @error('datepicker1')
                        <div class="alert alert-danger">
                            <span style="font-size: 15px;text-align: center;font-weight: bold">يرجى إدخال تاريخ المغادرة</span>
                        </div>
                        @enderror
                    </div></div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-lamp" style="color: orange;"></span>&nbsp;عـدد الليالـي  </label>
                        <input type="number" class="form-control" id="nights_count" min="1" name="nights_count" max="100" value="{{ old('nights_count') }}" placeholder="ادخـل  عـدد الليـالـي ..">
                    </div>
                    <div class="col-md-6 col-xs-12" style="float: right;">
                        <label style="color:#64AEF7;"><span class="glyphicon glyphicon-user"  style="color: orange;"></span>&nbsp;عـدد الأشـخاص  </label>
                        <input type="number" class="form-control" id="customers_count" min="1" max="100" value="{{ old('customers_count') }}" name="customers_count" placeholder="ادخـل  عـدد المسـافرين ..">
                        @error('customers_count')
                        <div class="alert alert-danger">
                            <span style="font-size: 15px;text-align: center;font-weight: bold">يرجى إدخال عدد الأشخاص</span>
                        </div>
                        @enderror
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

            </div>
        </div>

</div>
</center>
</div>


<br>
<center>

    <div class="well" style="background-color:#64AEF7; " >
        <div class="container">
            <div  class="col-md-6 col-xs-12" style="float:right;">
                <label style=" font-size: 25px; color:white; font-weight: bold; ">سـجـل مـعـنـا لـتـصـلـك عـروضـنـا</label>
            </div>

            <div class="col-md-6 col-xs-12" style="padding-left: 20px;" >
                <form method="post" action="{{route('subscribe')}}"  >
                    {{csrf_field()}}
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="أدخل بريدك الإلكتروني " style="text-align: right; font-size: 18px;">

                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="btn" style=" font-weight: bold;color:#64AEF7;margin-right: 4px" >اشـترك<span class="glyphicon glyphicon-ok" style="color: orange;"></span></button>
                </span>
                </div>
                </form>
            </div>
        </div>
    </div>



</center><br>

<div style="text-align: center; margin-bottom:-10px; color: #64AEF7">
    <h1 > المزايا التي يتمتع بها موقع ترافل رو</h1><br>
</div>
<div class="container cc" style="text-align:right; font-size: 20px;">
    <div class="row" style="color: #64AEF7;">
        <div class="col-md-4 col-xs-12 features" style=" border: 1px solid white; background-color:rgba(8,6,5,0.05); float: right;">
            <h2><span class="glyphicon glyphicon-plane" style="color: orange;"></span>&nbsp;رحلات طيران منافسة </h2>
            <p >احجز تذكرة الطيران الخاصة بك بسهولة لجميع الخطوط الجوية لجميع أنحاء العالم</p>
        </div>
        <div class="col-md-4 col-xs-12 features" style=" border: 1px solid white; background-color: rgba(8,6,5,0.05); float: right;">
            <h2><span class="glyphicon glyphicon-cutlery" style="color: orange;"></span>&nbsp;أفضل فنادق العالم </h2>
            <p >نوفر لك أفضل الأسعار لأكثر الفنادق حول العالم  وذات رفاهية عالية</p>
        </div>
        <div class="col-md-4 col-xs-12 features" style=" border: 1px solid white; background-color:rgba(8,6,5,0.05);">
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



<div class="container">
    <div style="text-align: center; margin-bottom:-10px; color: #64AEF7">
        <h1>تـقـيـيـم الـمـسـتـخـدمـيـن</h1><br>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color:#64AEF7;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="0"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="height: 200px; ">
            @foreach($rated_messages as $msg)
            <div class="item {{$loop->first?'active':''}}">
                <span style="padding:5px;word-wrap: break-word;">{{$msg->message}}</span>
                <h3>{{$msg->user_name}}</h3>
            </div>
            @endforeach

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

{{--
<script>
    $(document).ready(function(e) {
        $('#show').hide();
        $('form').submit(function(e) {
            $('#show').hide();

        });

    });

</script>--}}
