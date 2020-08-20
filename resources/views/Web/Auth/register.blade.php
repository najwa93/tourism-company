@extends('layouts.Web_app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ __('مـرحبا بـك .. ادخل بياناتك  للتسجيل معنا في موقع ترافـل رو ') }}</h1></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-12 col-form-label text-md-right">{{ __('الاسم الأول') }}</label>

                                <div class="col-md-8">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{ old('first_name') }}" required
                                           autocomplete="first_name" autofocus placeholder="أدخل الاسم  الأول">

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-12 col-form-label text-md-right">{{ __('الاسم الأخير') }}</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required
                                           autocomplete="last_name" autofocus placeholder="أدخل الاسم  الأخير">

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="user_name"
                                       class="col-md-12 col-form-label text-md-right">{{ __('اسم المستحدم') }}</label>

                                <div class="col-md-8">
                                    <input id="user_name" type="text"
                                           class="form-control @error('user_name') is-invalid @enderror"
                                           name="user_name" value="{{ old('user_name') }}" required
                                           autocomplete="user_name" autofocus placeholder="أدخل اسم المستخدم">

                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number"
                                       class="col-md-12 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                                <div class="col-md-8">
                                    <input id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number" value="{{ old('phone_number') }}" required
                                           autocomplete="phone_number" autofocus placeholder="أدخل  رقم الهاتف">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-12 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="أدخل  البريد الالكتروني">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-12 col-form-label text-md-right">{{ __('الجنس') }}</label>

                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="male"> Male<br>
                                        <input type="radio" name="gender" value="female"> Female<br>

                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-12 col-form-label text-md-right">{{ __('اختر البلد') }}</label>

                                <div class="col-md-8">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">اختر البلد</option>
                                        @foreach($countries as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                    </select><br>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-12 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password" placeholder="أدخل كلمة المرور">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-12 col-form-label text-md-right">{{ __('أعد إدخال كلمة المرور') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="أعد إدخال كلمة المرور">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تسجيل') }}
                                    </button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="glyphicon glyphicon-remove"></i>
                                        {{ __('إلغاء') }}
                                    </button>
                                </div>
                            </div>

                            {{--<div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="glyphicon glyphicon-remove"></i>
                                        {{ __('إلغاء') }}
                                    </button>
                                </div>
                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


