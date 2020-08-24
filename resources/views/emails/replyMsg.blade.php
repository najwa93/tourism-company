<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        body{
        }
        .header{
            width: 100%;
            height:52px;
        }

        .btn {
            width: 370px;
            height: 166px;
            padding: 14px 28px;
            font-size: 30px;
            cursor: pointer;
            display: inline-block;
        }

        /* Green */
        .success {
            border-color: #4CAF50;
            color: green;
        }

        .success:hover {
            background-color: #4CAF50;
            color: white;
        }

        /* Blue */
        .info {
            border-color: #2196F3;
            color: dodgerblue;
        }

        .info:hover {
            background: #2196F3;
            color: white;
        }

        /* Orange */
        .warning {
            border-color: #ff9800;
            color: orange;
        }

        .warning:hover {
            background: #ff9800;
            color: white;
        }

        /* Red */
        .danger {
            border-color: #f44336;
            color: red;
        }

        .danger:hover {
            background: #f44336;
            color: white;
        }
        @media screen and (max-width: 1000px) {
            .col-md-4
            {
                text-align: center;
                margin: 25px 0;
            }

            .col-xs-12{
                text-align: center;
                margin: 25px 0;
            }
        }

        .content{

            background-color: #f2f4f6;
        }
    </style>
</head>
<body>
<header class="header">

</header>
<br>
<div class="container content" >
    <div class="col-md-4">
    <h1 style="text-align: center;color: #ff9800;margin-bottom: 20px;padding-top: 20px">TravelRo Company</h1>
   {{-- <p style="font-size: 25px;color: #000;font-weight: bold;padding: 20px;">dsds</p>--}}
    <p style="font-size: 25px;color: #000;font-weight: bold;margin: 20px">{{$replyMsg}}</p>
   </div>
</div>
<footer>
    <div style="font-size: 20px;font-family: cursive; text-align: center; width: 100%; height: 36px; padding-top: 12px; background-color:#64AEF7" >
        <p style="color:white;">ترافل رو للسياحة والسفر  2020</p>
    </div>
</footer>

</body>
</html>