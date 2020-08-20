    <!DOCTYPE html>
    <html>
    <head>
        @include('Partials.Web._head')

        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
            }

            .header {
                width: 100%;
                height: 52px;
            }

            .p1 {
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
                background-color: #64AEF7;
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

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: right;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 12px 14px;
                font-size: 22px !important;
                line-height: 1.5 !important;
                transition: all 1s;
            }

            /* Change background color of buttons on hover */
            .tab button:hover { /*حركة انيميشن-*/
                background-color: white;
                color: #64AEF7;
                padding-right: 30px;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: white;
                color: #64AEF7;
                padding-right: 30px;
            }

            /* Style the tab content */
            .tabcontent {
                padding: 6px 12px;
                border: 1px solid orange;
                border-top: none;
                text-align: right;
                font-size: 20px;
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
            .btn1 {
                background-color: dodgerblue;
                color: white;
                padding: 15px 20px;
                border: none;
                cursor: pointer;
                width: 40%;
                opacity: 0.9;
                margin: 15px;
            }

            .btn1:hover {
                opacity: 1;

            }

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

            #myTable th, #myTable td {
                text-align: center; /* Left-align text */
                padding: 3px; /* Add padding */
                border: 1px solid orange;
            }

            #myTable tr {
                /* Add a bottom border to all table rows */
                border: 1px solid orange;
            }

            #myTable tr.header, #myTable tr:hover {
                /* Add a grey background color to the table header and on hover */
                background-color: #64AEF7;
            }
        </style>
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