@extends('layouts.Web_app')

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

    .table{
       margin-bottom:60px;
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
        <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;قائمة رحلات الطيران
        </div>
        <div class="container" style="color: #64AEF7; font-size: 20px;">
            <h1 style="font-weight: bold">الحجز الفندقي</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">اسم الفندق</th>
                    <th scope="col">نوع الغرفة</th>
                    <th scope="col">عدد الأشخاص</th>
                    <th scope="col">التفاصيل</th>
                    <th scope="col">تكلفة الليلة</th>
                </tr>
                </thead>
                <tbody>
               @foreach($allData['hotelReservation'] as $reservation)
                    <tr>
                        <td>{{$reservation['hotel']}}</td>
                        <td>{{$reservation['room_type']}}</td>
                        <td>{{$reservation['customers_count']}}</td>
                        <td>{{$reservation['room_details']}}</td>
                        <td>{{$reservation['customers_count']}}</td>

                        <th scope="col"><a href="{{route('deleteHotelReservation',$reservation['hotel_reservation_id'])}}" class="btn btn-danger" onclick="return confirm('هل تريد بالتأكيد القيام بعملة الحذف؟')"> إلغاء الحجز</a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h1 style="font-weight: bold">حجز رحلات الطيران</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">من المدينة</th>
                    <th scope="col">إلى المدينة</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">الوقت</th>
                    <th scope="col">سعرالتذكرة</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($allData['flightReservation'] as $reservation)
                    <tr>
                        <td>{{$reservation['source_city']}}</td>
                        <td>{{$reservation['destination_city']}}</td>
                        <td>{{$reservation['date']}}</td>
                        <td>{{$reservation['time']}}</td>
                        <td>{{$reservation['flight_degree']}}</td>
                        <th scope="col"><a href="{{route('deleteFlightReservation',$reservation['flight_reservation_id'])}}" class="btn btn-danger" onclick="return confirm('هل تريد بالتأكيد القيام بعملة الحذف؟')"> إلغاء الحجز</a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <br>

            <br>
            <br>
        </div>
    </div>
    <br>
@endsection

@include('Partials.Web._javascript')
{{--
<script>
    function myFunction() {
        alert("هل تريد بالتأكيد القيام بعملية الحذف؟")
    }
</script>
--}}


