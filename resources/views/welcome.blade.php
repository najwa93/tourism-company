    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <h1>DropDown Feature:</h1>
        <div class="form-group">
            <label for="country">Select your country</label>
            <select name="country" id="country" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city">Select your city</label>
            <select name="city" id="country" class="form-control">
                <option value="">City</option>

            </select>
        </div>

    </div>


    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('select[name="country"]').on('change',function () {
                var country_id = $(this).val();

                if(country_id){
                    //console.log(country_id);
                    $.ajax({
                        url: '/getStates/' + country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                           // console.log(data);
                            $('select[name="city"]').empty();
                            // loop through the data
                            $.each(data,function (key,value) {
                              //  console.log(key);
                                $('select[name="city"]').append('<option value="'+key+'">' + value + '</option>');
                            })
                        }
                    })
                }else {
                    ('select[name="city"]').empty();
                }
            })
        })
    </script>
    </body>
    </html>
