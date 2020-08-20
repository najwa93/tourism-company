@extends('layouts.Web_app')


@section('content')
    <div class="p1">
        <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;قائمة رحلات الطيران
        </div>
        <div class="container" style="color: #64AEF7; font-size: 20px;">
            <h1>الحجز الفندقي</h1>
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
                @foreach($hotel_data as $hotel)
                    <tr>
                        <td>{{$hotel['hotel_name']}}</td>
                        <td>{{$hotel['room_type']}}</td>
                        <td>{{$hotel['customers_count']}}</td>
                        <td>{{$hotel['room_details']}}</td>
                        <td>{{$hotel['night_price']}}</td>
                        <th scope="col"><a href="{{url('Web/hotelDetails/'.$hotel['hotel_id'].'/'. $hotel['room_id'] )}}"> <button type="submit" class="btn btn-warning" style="color: white; width: 120px;height: 35px; font-size: 20px;padding: 4px ">&nbsp;إالغاء الحجز</button></a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h1>حجز رحلات الطيران</h1>
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
                @foreach($flight_data as $flight)
                    <tr>
                        <td>{{$flight['source_city']}}</td>
                        <td>{{$flight['destination_city']}}</td>
                        <td>{{$flight['date']}}</td>
                        <td>{{$flight['time']}}</td>
                        <td>{{$flight['ticket_price']}}</td>
                        <th scope="col"><a href="{{route('flightDetails',$flight['flight_id'])}}"><button type="button" class="btn btn-warning" style="color: white; width: 120px;height: 35px; font-size: 20px;padding: 4px ">&nbsp;إالغاء الحجز</button></a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <br>

            <h1>حجز العرض</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">البلد</th>
                    <th scope="col">المدينة</th>
                    <th scope="col">التاريخ</th>
                    <th>التفاصيل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offer_data as $offer)
                    <tr>
                        <td>{{$offer['country']}}</td>
                        <td>{{$offer['destination_city']}}</td>
                        <td>{{$offer['date']}}</td>
                        <th scope="col"><a href="{{route('offerDetails',['offer' => $offer['offer_id'],'flight' => $offer['flight_id']])}}"><button type="button" class="btn btn-warning" style="color: white; width: 120px;height: 35px; font-size: 20px;padding: 4px ">&nbsp;إالغاء الحجز</button></a><br>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>
    <br>
@endsection


