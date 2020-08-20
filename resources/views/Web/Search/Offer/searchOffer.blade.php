@extends('Layouts.Web_app')
<style>
    *{
        margin: 0;
        padding: 0;
    }

    .header {
        width: 100%;
        height: 52px;
    }

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

    .cc div:hover {
        padding: 5px;
        transition: all 1s;
    }

    .hh {
        text-align: center;
        font-weight: bold;
        font-family: arial;
        border: 4px solid white;
    }

    .hh a {
        font-size: 25px;
        text-align: center;
        color: white;
        border-radius: 10px;
        background-color: #99ccff;
        padding-right: 10px;
        padding-left: 10px;
        margin-top: 75px;
    }

    .hh a:hover {
        color: #64AEF7;
        font-weight: bold;
        background-color: orange;
        padding: 15px;
        transition: all 1s;
    }

    .hr {
        background: orange;
    }

    .contact-form {
        color: #64AEF7;
        padding: 20px;
        box-shadow: 0px 0px 5px 3px orange;
    }

    .navbar {
        background-color: #64AEF7 !important;
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

    .modal {
        box-shadow: 2px 2px 2px 2px orange;
    }

    .modal-body {
        color: #64AEF7;
        font-size: 18px;
    }

    .in {
        text-align: right;
    }

    .item {
        color: white;
        font-size: 25px;
        text-align: center;
        padding-top: 30px;
    }

    .tab {
        overflow: hidden;
        border: 1px;
        background-color: #64AEF7;
        color: white;
    }


    * {
        box-sizing: border-box;
    }

    /* Style the input container */
    .input-container {
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    /* Style the form icons */
    .icon {
        padding: 10px;
        background: dodgerblue;
        color: white;
        min-width: 50px;
        text-align: center;
    }

    /* Style the input fields */
    .input-field {
        width: 100%;
        padding: 10px;
        outline: none;
    }

    .input-field:focus {
        border: 1px solid orange;
    }

    /* Set a style for the submit button */


    .social-icon button {
        font-size: 20px;
        color: white;
        height: 50px;
        width: 50px;
        background: #45aba6;
        border-radius: 60%;
        margin: 0px 10px;
        border: none;
        cursor: pointer;
    }

    .fb {
        background-color: #3B5998;
        color: white;
    }

    .twitter {
        background-color: #55ACEE;
        color: white;
    }

    .google {
        background-color: #dd4b39;
        color: white;
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
</style>

@section('content')
    <div class="p1">
        <div class="well" style="font-size: 25px;font-weight: bold; color: #64AEF7; text-align: center;"><span class="glyphicon glyphicon-user" style="color: orange;"></span>&nbsp;قائمة رحلات الطيران
        </div>
        <div class="container" style="color: #64AEF7; font-size: 20px;">
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
                        <th scope="col"><a href="{{route('offerDetails',['offer' => $offer['offer_id'],'flight' => $offer['flight_id']])}}"><button type="button" class="btn btn-warning" style="color: white; width: 120px;height: 35px; font-size: 20px;padding: 4px ">&nbsp;التفاصيل</button></a><br>
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