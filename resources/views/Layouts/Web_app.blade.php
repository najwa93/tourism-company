    <!DOCTYPE html>
    <html>
    <head>
        @include('Partials.Web._head')


    </head>

    <body>
    @section('contact')
        تواصل  معنـا
    @endsection


    @include('Partials.Web._header')

    @yield('content')

    @include('Partials.Web._footer')


    </body>
    </html>