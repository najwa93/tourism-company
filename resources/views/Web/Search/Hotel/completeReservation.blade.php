@extends('layouts.Web_app')
@section('styles')
 .content{
   border:1px solid red;
  }
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center content">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1 style="color: #FFA500;font-weight: bold;margin-bottom: 20px">{{ __('إتمام عملية الحجز ') }}</h1></div>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <span style="font-size: 15px;text-align: center;font-weight: bold">{{ $message }}</span>
                        </div>

                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('completeHotelReservation',['hotel' => $hotel->id,'room' => $room->id])}}">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-12 col-form-label text-md-right">{{ __('الاسم الأول') }}</label>

                                <div >
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{$user->first_name}}"
                                           autocomplete="first_name" autofocus readonly>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-12 col-form-label text-md-right">{{ __('الاسم الأخير') }}</label>

                                <div >
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{$user->last_name}}"
                                           autocomplete="last_name" autofocus readonly placeholder="أدخل الاسم  الأخير">

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-12 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>

                                <div >
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{$user->email}}"  autocomplete="email" readonly
                                           placeholder="أدخل  البريد الالكتروني">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number"
                                       class="col-md-12 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                                <div >
                                    <input id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number" value="{{ $user->phone_number }}" required
                                           autocomplete="phone_number" autofocus readonly
                                           placeholder="أدخل  رقم الهاتف">


                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-12 col-form-label text-md-right">{{ __(' البلد') }}</label>

                                <div >
                                    <input id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           name="phone_number" value="{{$user->country->name}}"
                                           autofocus readonly>
                                </div>
                            </div>


                            <label for="credit" class="col-md-12 col-form-label text-md-right">{{ __('الدفع') }}</label>
                            <div class="form-group row">
                                <label for="credit"
                                       class="col-md-12 col-form-label text-md-right">{{ __('اسم البطاقة') }}</label>

                                <div >
                                    <input id="credit" type="text"
                                           class="form-control @error('credit') is-invalid @enderror"
                                           name="credit" value="{{ $user->credit }}" required
                                           autocomplete="credit" autofocus placeholder="أدخل اسم البطاقة">

                                    @error('credit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="credit_number"
                                       class="col-md-12 col-form-label text-md-right">{{ __('رصيد البطاقة') }}</label>
                                <div >
                                    <input id="credit_number" type="text"
                                           class="form-control @error('credit_number') is-invalid @enderror"
                                           name="credit_number"
                                           value="{{ $user->credit_number }}" required autocomplete="credit"
                                           placeholder="أدخل  رصيد البطاقة">

                                    @error('credit_number')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>يرجى إدخال رصيد صالح للبطاقة</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('إتمام الحجز') }}
                                    </button>
                                    <a href="{{route('home_page.index')}}">
                                        <button type="button" class="btn btn-warning">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            {{ __('إلغاء') }}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('Partials.Web._javascript')

