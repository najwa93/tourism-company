<body>
<header class="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"
                        style="border-color:orange;   color: white !important;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-family:Georgia; font-style: italic; font-size: 32px; color:white; ">Travel<span
                            style="font-family:Georgia;font-style: italic; color:orange;">Ro</span> </a>
            </div>


            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home_page.index')}}" class="h"><span class="glyphicon glyphicon-home"
                                                                               style="color: orange;"></span>&nbsp;الـرئيسـيـة</a>
                    </li>
                    <li><a href="#contact" class="h"><span class="glyphicon glyphicon-envelope"
                                                           style="color: orange;"></span>&nbsp; @yield('contact')</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{route('logout')}}" class="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-user"
                                                                         style="color: orange;"></span>&nbsp;تسجيل
                                الخروج
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    @else
                        <li>
                            <a href="{{route('register')}}" class=""><span class="glyphicon glyphicon-user"
                                                                           style="color: orange;"></span>&nbsp; إنشاء
                                حسـاب
                            </a>
                        </li>
                        <li><a href="{{route('login')}}" class="h"><span class="glyphicon glyphicon-log-in"
                                                                         style="color:orange;"></span>&nbsp;تسجيل الدخول
                            </a></li>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>