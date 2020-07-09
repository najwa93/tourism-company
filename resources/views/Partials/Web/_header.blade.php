<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header navbar-left">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border-color:orange;   color: white !important;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="font-family:Georgia; font-style: italic; font-size: 32px; color:white; ">Travel<span style="font-family:Georgia;font-style: italic; color:orange;">Ro</span> </a>
        </div>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#"  class="h"><span  class="glyphicon glyphicon-home"style="color: orange;"></span>&nbsp;الـرئيسـيـة</a></li>
                <li><a href="#contact"  class="h"><span class="glyphicon glyphicon-envelope"style="color: orange;"></span>&nbsp; @yield('contact')</a></li>
                <li>
                    <a href="create-account.php"  class=""><span class="glyphicon glyphicon-user"style="color: orange;"></span>&nbsp; إنشاء حسـاب  </a>
                </li>
                <li><a href="" data-toggle="modal" data-target="#myModal" data-backdrop="static" class="h"><span class="glyphicon glyphicon-log-in" style="color:orange;"></span>&nbsp;تسجيل الدخول </a></li>

            </ul>
        </div>
    </div>
</nav>