@extends('Layouts/Admin_app')

@section('styles')

    * {
    margin: 0;
    padding: 0;
    }

    body {
    }

    .header {
    width: 100%;
    height: 52px;
    }

    .navbar {
    background-color: #64AEF7;
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

    .p1 {
    background-image: url("{{asset('images/globe.jpg')}}");
    width: 100%;
    height: 300px;
    background-size: cover;
    overflow-y: auto;
    overflow-x: auto;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: -1px;
    opacity: 0.9;
    }
@endsection

@section('title')
    تعديل بـلـد
@endsection



@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="p1">
        <div class="p1"><label
                    style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span
                        class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;تعديل بلد</label></div>
    </div>
    <div class="container">
        <br>
        <div class="col-md-6 col-xs-12" style="float: right;">
            <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-download" style="color: orange;"></span>&nbsp;أضــف
                بــلــد إلــى قــائـمـة الـبــلــدان الـمـتـاحـة</label>
            <hr>
            <br>
            <br>
            <form action="{{route('Countries.update',$country->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                    <div class="form-group ">
                        <label for="usr">اســم الـبــلــد:</label>
                        <input type="text" class="form-control" id="usr" name="countryname" value="{{$country->name}}"
                               style="font-size: 22px; color: black;">
                    </div>
                    @error('countryname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="form-group">
                        <label for="flag">عـلــم الـبــلــد:</label>
                        <input type="file" name="image">
                        <img src="{{url('/images/'.$country->img_path)}}" style="width: 150px;height: 140px;">
                    </div>
                    @error('image')
                    <div class="alert alert-danger"><?php echo("upload an image please")?></div>
                    @enderror

                    <button type="submit" class="btn btn-info" name="btnc"
                            style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                                class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;تعديل
                    </button>

                </div>
            </form>

        </div>
    </div>
    <br>
    <br>
@endsection