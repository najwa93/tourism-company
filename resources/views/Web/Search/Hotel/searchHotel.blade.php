@extends('Layouts.Web_app')
@section('styles')

    .p1 {
    margin-top: 0;
    background-image: url('{{asset("images/test.png")}}');
    background-size: cover;
    height: 600px;
    overflow-y: auto;
    overflow-x: auto;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    }

    .p2 {
    padding-top: 5px;
    font-family: Arial;
    font-style: italic;
    font-size: 38px;
    color: #64AEF7;
    font-weight: bold;
    }

    #myTable {
    width: 100%; /* Full-width */
    font-size: 20px; /* Increase font-size */
    color: white;
    }

    .table tr th{
    font-size:25px;
    color: #FFA500;
    text-align:center;
    }

    .table tr td{
    text-align:center;
    font-size:19px;
    color: #263859;
    font-weight:bold;
    }
@endsection

@section('content')
    <div class="p1">
       {{-- <label style="font-size: 40px;  color: white; font-weight: bold; margin-right: 12%;">&nbspالفنادق المتوفرة</label>--}}
        <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;قائمة الفنادق
        </div>
        <div class="container" style="color: #64AEF7; font-size: 20px;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">اسم الفندق</th>
                    <th scope="col">النوع</th>
                    <th scope="col">عدد الأشخاص</th>
                    <th scope="col">التفاصيل</th>
                    <th scope="col">تكلفة الليلة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hotel_data as $hotel)
                    <tr>
                        <td>{{$hotel['hotel_name']}}</td>
                        <td>{{$hotel['room_type']}}</td>
                        <td>{{$hotel['customers_count']}}</td>
                        <td>{{$hotel['room_details']}}</td>
                        <td>{{$hotel['night_price']}}</td>
                        <th scope="col"><a href="{{url('Web/hotelDetails/'.$hotel['hotel_id'].'/'. $hotel['room_id'] )}}"> <button type="submit" class="btn btn-warning" style="color: white; width: 120px;height: 35px; font-size: 20px;padding: 4px ">&nbsp;التفاصيل</button></a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>
    <br>
    @include('Partials.Web._javascript')
@endsection