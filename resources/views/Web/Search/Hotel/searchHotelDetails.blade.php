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
            {{csrf_field()}}
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
                <a href="{{ route('hotelReservation',['hotel' => $hotel->id,'room' => $room->id])}}"><button type="button" class="btn btn-info"  name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;احجز الاّن</button></a>
            <button type="submit" class="btn btn-info" name="btnsave" style="color: white; height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;الغاء</button>
            </div>
    </div>

   {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>
--}}
    <!-- Modal -->

    {{--@auth--}}
    {{--<div class="modal fade modal-style" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLongTitle">تأكيد الحجز</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="container">--}}
                        {{--<div class="row justify-content-center">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<div class="card">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<form method="POST" action="{{ route('hotelReservation') }}">--}}
                                            {{--@csrf--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                                {{--<div class="col-md-6">--}}
                                                    {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>--}}

                                                    {{--@error('email')--}}
                                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                                    {{--@enderror--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group row mb-0">--}}
                                                {{--<div class="col-md-6 offset-md-4">--}}
                                                    {{--<button type="submit" class="btn btn-primary">--}}
                                                        {{--{{ __('تأكيد') }}--}}
                                                    {{--</button>--}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endauth--}}
       {{-- @guest--}}
            {{--<div class="container">--}}
                {{--<div class="row justify-content-center">--}}
                    {{--<div class="col-md-8">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-header">{{ __('تسجيل الدخول') }}</div>--}}

                            {{--<div class="card-body">--}}
                                {{--<form method="POST" action="{{ route('login') }}">--}}
                                    {{--@csrf--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                                            {{--@error('email')--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@enderror--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                            {{--@error('password')--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@enderror--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<div class="col-md-6 offset-md-4">--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                                {{--<label class="form-check-label" for="remember">--}}
                                                    {{--{{ __('Remember Me') }}--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row mb-0">--}}
                                        {{--<div class="col-md-8 offset-md-4">--}}
                                            {{--<button type="submit" class="btn btn-primary">--}}
                                                {{--{{ __('Login') }}--}}
                                            {{--</button>--}}

                                            {{--@if (Route::has('password.request'))--}}
                                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                    {{--{{ __('نسيت كلمة المرور؟') }}--}}
                                                {{--</a>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<a  href="{{ route('register') }}">--}}
                                        {{--{{ __('لايوجد لديك حساب؟') }}--}}
                                    {{--</a>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endguest--}}
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
