@extends('Layouts.Web_app')

<style>
    .panel-body h4 {
        font-weight: bold;
    }
</style>
@section('content')
    <div class="container">
        <form method="post" action="">
            <div class="details">
                <h1>تفاصيل الفندق</h1>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><span>فندق</span> {{$hotel->name}}</h3></div>
                        <div class="panel-body">
                            <h4><span>   عدد النجوم :</span> {{$hotel->stars}}</h4>
                            <h3><span>   صور من الفندق :</span></h3>
                            <div class="autoplay">
                                @foreach($hotel->hotelImage as $img)
                                    <img src="{{url('/images/'.$img->img_path)}}"
                                         style="width: 250px;height: 200px; margin: 10px" alt="hotel Image">
                                @endforeach
                            </div>
                            <h3><span>  معلومات عن الفندق :</span> {{$hotel->details}}</h3>
                            <h3><span>  تفاصيل الغرفة :</span> {{$room->details}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info" name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;احجز الاّن</button>

        </form>
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
            autoplay: true,
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
