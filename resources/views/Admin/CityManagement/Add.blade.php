<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إضافة مديـنـة جـديـدة</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.min.css" rel="stylesheet">
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
        .navbar {
            background-color:#64AEF7;
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
        .p1{
            background-image: url('image/globe.jpg');
            width: 100%;
            height: 300px;
            background-size:cover;
            overflow-y: auto;
            overflow-x: auto;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            margin-top: -1px;
            opacity: 0.9;
        }
    </style>
</head>

<body>
<header class="header">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border-color:orange;   color: white !important;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-family:Georgia; font-style: italic; font-size: 32px;color:white;">Travel<span style="font-family:Georgia;font-style: italic; color:orange;">Ro</span> </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"  class="h"><span class="glyphicon glyphicon-home"style="color: orange;"></span>&nbsp;الرئيسية</i></a></li>
                    <li><a href="manager.php"  class="h"><span class="glyphicon glyphicon-wrench"style="color: orange;"></span>&nbsp;إدارة  الموقع</i></a></li>
                    <li><a href="" class="h"><span class="glyphicon glyphicon-user"style="color: orange;"></span>&nbsp;أهـلا بـك</i></a></li>
                    <li><a href="logout.html" class="h"><span class="glyphicon glyphicon-log-out" style="color:orange;"></span>&nbsp;تسجيل الخروج  </i></a></li>
                </ul>
            </div>
    </nav>

</header>
<form action="add-city.php" method="POST">
    <div class="p1"><label style="font-size: 40px; margin-top:9%; color: white; font-weight: bold; margin-right: 12%;"><span class="glyphicon glyphicon-globe" style="color: orange;"></span>&nbsp;إضـافـة مـديـنـة جـديـدة</label></div>
    <br>
    <br>
    <div class="container">
        <div class="col-md-6 col-xs-12" style="float: right;">
            <label style=" font-size: 25px;
    color:#64AEF7; font-weight: bold;"><span class="glyphicon glyphicon-download" style="color: orange;"></span>&nbsp;أضــف  مـديــنــة  إلــى قــائـمـة الــمــدن  الـمـتـاحـة</label>
            <br>
            <br>
            <br>
            <form action="add-city.php" method="POST">
                <div style="font-size: 22px; font-weight: bold; color:#64AEF7;margin-right: 80px;">
                    <div class="form-group ">
                        <label for="usr">اســم الـمـديـنـة</label>
                        <input type="text" class="form-control" name="cityname" placeholder="أدخــل اســم الـمــديــنــة" style="font-size: 22px; color: black;">
                    </div>
                    <div class="form-group ">
                        <label for="usr">عــن الـمـديـنـة</label>
                        <textarea class="form-control" name="aboutcity" placeholder="أدخــل مـعـلـومـات عـن الـمــديـنـة"style="text-align:right;font-size:22px; color: black;"rows="4"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="usr">مـوقــع الـمـديـنـة</label>
                        <input type="text" class="form-control" name="location" id="usr" placeholder="أدخـل مـوقـع الـمــديــنــة مــن خـرائــط غـوغـل" style="font-size: 22px; color: black;">
                    </div>
                    <div class="form-group">
                        <label for="flag">صـور  مـن الـمـديـنـة</label>
                        <input id="file-input" type="file"name="image" >
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info" name="btnsave" style="color: white; width: 100px;height: 40px; font-size: 20px;"><span class="glyphicon glyphicon-floppy-save" style="color: orange;"></span>&nbsp;إضـافــة</button>

                </div>
        </div>
    </div>
</form>
<br>
<br>
<footer>
    <div style="font-size: 20px;font-family: cursive; text-align: center; width: 100%; height: 55px; padding-top: 12px; background-color:#64AEF7" >
        <p style="color:white;">&copy;&nbsp;ترافل رو للسياحة والسفر  2020</p>
    </div>
</footer>

<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php
$conn=mysqli_connect('localhost','root','','dbtravelro') ;
if (isset($_POST['btnsave']))
{
    $target="uploads/".basename($_FILES['image']['name']);
    $name=$_POST['cityname'];
    $aboutcity=$_POST['aboutcity'];
    $location=$_POST['location'];
    $image=$_FILES['image']['name'];
    $query=" insert into cities('Name','description','CityLocation','CityImage') values ('$name','$aboutcity','$location','$image')";
    $result=mysqli_query($conn,$query);
    if ($result) {
        echo "<script> alert('true')</script>";
    }
}
?>