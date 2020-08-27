@extends('Layouts.Web_app')

@section('styles')
    .panel-body h4 {
        font-weight: bold;
    }

    .slick-prev:before, .slick-next:before{
    color: #64AEF7;!important;
    }

    .panel-body{
     padding: 15px 30px !important;
    }

    .panel-group .panel{
     margin-top:20px;
    }

    .modal-style{
        margin-top: 100px;
    }
@endsection
@section('content')
    <div class="container">

        <div class="offer_details">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"> <h1 style="font-weight: bold;color: #64AEF7;">تفاصيل العرض</h1></div>
                    <div class="panel-body">
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">   إلى المدينة :</span> {{$flight->destination_city->name}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">   اسم الفندق :</span> {{$hotel->name}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px"> مدة الرحلة :</span> {{$flight->flight_duration}}</h3>
                    </div>
                </div>
            </div>

        </div>
        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>رحـلـةالذهاب</label></div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">من المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">إلى المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">التاريخ
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">الوقت
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
                <tr>
                    <td>{{$flight->source_city->name}}</td>
                    <td>{{$flight->destination_city->name}}</td>
                    <td>{{$flight->date}}</td>
                    <td>{{$flight->updated_time}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <hr>
        <br>

        <div style="text-align: center; color:#64AEF7; font-size: 28px;"><label>رحـلـة العـودة</label></div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">من المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">إلى المدينة
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">التاريخ
                </td>
                <td class="text-center col-xs-4"
                    style="font-size: 20px;width: 200px; color: white; background-color: #64AEF7;">الوقت
                </td>

            </tr>
            </thead>
            <tbody style="text-align: center;" dir="ltr">
                <tr>
                    <td>{{$returned_flight->source_city->name}}</td>
                    <td>{{$returned_flight->destination_city->name}}</td>
                    <td>{{$returned_flight->date}}</td>
                    <td>{{$returned_flight->updated_time}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <hr>
        <br>

        <div class="details">

            <div class="panel-group">
                <div class="panel panel-default">

                    <div class="panel-heading"><h1 style="font-weight: bold;color: #64AEF7;">تفاصيل الفندق</h1></div>
                    <div class="panel-body">
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">  اسم الفندق :</span> {{$hotel->name}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">  حول الفندق :</span> {{$hotel->details}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">   صور من الفندق :</span></h3>
                        <div class="autoplay">
                            @foreach($hotel->hotelImage as $img)
                                <img src="{{url('/images/'.$img->img_path)}}"
                                     style="width: 250px;height: 200px; margin: 10px" alt="hotel Image">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details">

            <div class="panel-group">
                <div class="panel panel-default">

                    <div class="panel-heading"> <h1 style="font-weight: bold;color: #64AEF7;">تفاصيل المدينة</h1></div>
                    <div class="panel-body">
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">  اسم المدينة :</span> {{$flight->destination_city->name}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">  حول المدينة :</span> {{$flight->destination_city->description}}</h3>
                        <h3><span style="color: #FFA500;font-weight: bold;margin-bottom: 20px">   صور من المدينة :</span></h3>
                        <div class="autoplay">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons" style="margin: 20px;">
            <a href="{{route('offerReservation',['offer' => $offer->id,'flight' => $flight->id])}}"><button type="button" class="btn btn-info"  name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;احجز الاّن</button></a>
            <button type="button" class="btn btn-info" name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;الغاء</button>
        </div>
    </div>

@endsection

@include('Partials.Web._jquery')
<script>

    $(document).ready(function () {
        $('.autoplay').slick({
            rtl: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            autoplaySpeed: 2000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });


</script>
