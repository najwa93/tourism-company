@extends('Layouts/Admin_app')

@section('title')
    تعديل غـرفـة
@endsection

@section('styles')
    .p1{
    background-image: url("{{asset('images/hotel.jpg')}}");
    width: 100%;
    height: 300px;
    background-size:cover;
    overflow-y: auto;
    overflow-x: auto;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: -1px;
    opacity: 0.9;
    }
@endsection

@section('content')
    <div class="p1"><label
                style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span
                    class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;تعديـل غـرفـة </label></div>
    <br>
    <br>
    <br>

    <form action="{{route('Rooms.update',$hotelRoom->id)}}" method="POST">
        {{csrf_field()}}
        @method('PUT')
        <div class="container">
            <div class="col-md-6 col-xs-12" style="float: right;">
                <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-list" style="color: orange;"></span>&nbsp;امـلأ
                    الـنـمـوذج الـتـالــي لإضــافـة غـرفـة إلـى قـائـمـة الـغـرف </label>
                <hr>
                <br>
                <br>
                <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                    <div class="form-group ">
                        <label for="usr">الاسم</label>
                        <input type="text" class="form-control" name="name" id="usr" placeholder="أدخــل اســم الـغرفة"
                               value="{{$hotelRoom->name}}" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">النوع</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">اختر النوع</option>
                            @foreach($roomTypes as $roomType)
                                <option {{$roomType->id == $hotelRoom->room_type_id?'selected="selected"':''}}  value="{{$roomType->id}}">{{$roomType->name}}</option>
                            @endforeach
                        </select>
                        {{-- {{$room->room_type->name}}--}}


                    </div>
                    <div class="form-group ">
                        <label for="usr">عـدد الاشخاص</label>
                        <input type="number" class="form-control" name="custcount" id="usr" placeholder="عـدد الاشخاص"
                               value="{{$hotelRoom->customers_count}}" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">تكلفة الليلة</label>
                        <input type="text" class="form-control" name="price" id="usr" placeholder="تكلفة الليلة"
                               value="{{$hotelRoom->night_price}}" style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">التفاصيل</label>
                        <input type="text" class="form-control" name="about" id="usr"
                               placeholder="أدخـل  مزايا تتمتع بها الغرفة" value="{{$hotelRoom->details}}"
                               style="font-size: 20px; color: black;">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$hotelRoom->is_available == true ?'checked':''}} value="{{$hotelRoom->is_available}}" class="switch-input"
                               name="available"/>
                        <label class="form-check-label" for="exampleCheck1">الغرفة متاحة</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info" name="btnsave"
                            style="color: white; width: 100px;height: 40px; font-size: 20px;"><span
                                class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;تـعديـل
                    </button>

                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
@endsection
