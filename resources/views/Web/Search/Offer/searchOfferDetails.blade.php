@extends('Layouts.Web_app')

<style>
    .panel-body h4 {
        font-weight: bold;
    }

    .slick-prev:before, .slick-next:before{
        color: #000;!important;
    }

    .modal-style{
        margin-top: 100px;
    }
</style>
@section('content')
    <div class="container">

        <div class="offer_details">
            <h1>تفاصيل العرض</h1>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><span>   إلى المدينة :</span> {{$flight->destination_city->name}}</h4>
                        <h4><span>   اسم الفندق :</span> {{$offer->hotel->name}}</h4>
                        <h3><span> مدة الرحلة :</span> {{$flight->flight_duration}}</h3>
                    </div>
                </div>
            </div>
        </div>

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
                    <td>{{$flight->time}}</td>
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
                    <td>{{$flight->source_city->name}}</td>
                    <td>{{$flight->destination_city->name}}</td>
                    <td>{{$flight->date}}</td>
                    <td>{{$flight->time}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <hr>
        <br>

        <div class="details">
            <h1>تفاصيل الفندق</h1>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3> {{$hotel->name}}</h3></div>
                    <div class="panel-body">
                        <h3><span>  حول الفندق :</span> {{$hotel->details}}</h3>
                        <h3><span>   صور من الفندق :</span></h3>
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
            <h1>تفاصيل المدينة</h1>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><span>مدينة</span>{{$flight->destination_city->name}}</h3></div>
                    <div class="panel-body">
                        <h3><span>  حول المدينة :</span> {{$flight->destination_city->description}}</h3>
                        <h3><span>   صور من الفندق :</span></h3>
                    </div>
                </div>
            </div>
        </div>
            <a href="{{route('offerReservation',['offer' => $offer->id,'flight' => $flight->id])}}"><button type="button" class="btn btn-info"  name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;احجز الاّن</button></a>
            <button type="button" class="btn btn-info" name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;الغاء</button>
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