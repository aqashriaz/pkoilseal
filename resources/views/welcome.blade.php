<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pk Rubber Oil Seal</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>


        body {
            font-family: 'Roboto';font-size: 16px;
        }

        .aboutus-section {
            padding: 90px 0;
        }
        .aboutus-title {
            font-size: 30px;
            letter-spacing: 0;
            line-height: 32px;
            margin: 0 0 30px;
            padding: 0 0 11px;
            position: relative;
            text-transform: uppercase;
            color: #000;
        }
        .aboutus-title::after {
            background: #fdb801 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 2px;
            left: 0;
            position: absolute;
            width: 54px;
        }
        .aboutus-text {
            color: #606060;
            font-size: 13px;
            line-height: 22px;
            margin: 0 0 30px;
        }

        a:hover, a:active {
            color: #ffb901;
            text-decoration: none;
            outline: 0;
        }
        .aboutus-more {
            border: 1px solid #fdb801;
            border-radius: 25px;
            color: #fdb801;
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0;
            padding: 7px 20px;
            text-transform: uppercase;
        }
        .feature .feature-box .iconset {
            background: #fff none repeat scroll 0 0;
            float: left;
            position: relative;
            width: 18%;
        }
        .feature .feature-box .iconset::after {
            background: #fdb801 none repeat scroll 0 0;
            content: "";
            height: 150%;
            left: 43%;
            position: absolute;
            top: 100%;
            width: 1px;
        }

        .feature .feature-box .feature-content h4 {
            color: #0f0f0f;
            font-size: 18px;
            letter-spacing: 0;
            line-height: 22px;
            margin: 0 0 5px;
        }


        .feature .feature-box .feature-content {
            float: left;
            padding-left: 28px;
            width: 78%;
        }
        .feature .feature-box .feature-content h4 {
            color: #0f0f0f;
            font-size: 18px;
            letter-spacing: 0;
            line-height: 22px;
            margin: 0 0 5px;
        }
        .feature .feature-box .feature-content p {
            color: #606060;
            font-size: 13px;
            line-height: 22px;
        }
        .icon {
            color : #f4b841;
            padding:0px;
            font-size:40px;
            border: 1px solid #fdb801;
            border-radius: 100px;
            color: #fdb801;
            font-size: 28px;
            height: 70px;
            line-height: 70px;
            text-align: center;
            width: 70px;
        }

    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>

    <div class="aboutus-section ">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Pk Inventory</h2>
                        <p class="aboutus-text">Pk Inventory Management system enables a company to maintain a centralized record of every asset and item in the control of the organization, providing a single source of truth for the location of every item, vendor and supplier information, specifications, and the total number of a particular item currently in stock</p>
                        <p class="aboutus-text">Pk Inventory management software is a software system for tracking inventory levels, orders, sales and deliveries.</p>
                        @if (Auth::check())
                        <a class="aboutus-more" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Login</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                        @else
                        <a class="aboutus-more" href="{{ url('/login') }}">Login</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="public/images/pklogo.png" alt="" width="300px" height="300px">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>Super Admin</h4>
                                    <p>1.Only Super Admin can add inventory managers and front desk managers.<br>
                                        2. He can monitor and manage everything.<br>
                                        3. He can add products.<br>
                                        4. He can add and manage size, color and warehouse.<br>
                                        5. He can manage inventory.<br>
                                        6. Only Super Admin can view reports.<br>
                                    7. He can see the returned items list by date.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>Inventory Manager</h4>
                                    <p>1.He can add new Products.<br>
                                        2. He can manage products.<br>
                                        3. He can manage stocks.<br>
                                        4. He can view overall inventory present in all warehouses.<br>
                                    5. He will get alerts (Both red and orange).</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>Front Manager</h4>
                                    <p>1.He can search products using barcode reader or text field.<br>
                                        2. On searching a specific product, he will see the quantity of the product from all the warehouses.<br>
                                        3. He can sell products.<br>
                                    4. He can return product.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}" class="font-weight-bold text-black-50">Login</a>
                       <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content"> 
            </div>
        </div> -->
    </body>
    </html>
