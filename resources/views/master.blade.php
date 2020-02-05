<!--Template Name: vacayhome
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./vacayhome/images/icons/favicon.png"/>
    <title>vacayhome</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vacayhome/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vacayhome/swiper.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vacayhome/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('vacayhome/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vacayhome/fonts/antonio-exotic/stylesheet.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="./vacayhome/css/lightbox.min.css">
    <link href="{{asset('vacayhome/css/responsive.css')}}" rel="stylesheet">
    <script src="{{asset('vacayhome/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vacayhome/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vacayhome/js/lightbox-plus-jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vacayhome/js/instafeed.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vacayhome/js/custom.js')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <script src="{{asset('vacayhome/swiper.min.js')}}"></script>
    
    <style>
        body{
            background-color: #f1f1f1;
            font-family: "montserrat", sans-serif;
        }
    </style>
</head>
<body>
    <div id="page">
        <!---header top---->
        <div class="top-header">
            <div class="container">
                @include('header')
                <div class="clearfix"></div>

                @yield('content')
                
                <!---footer--->
                @include('footer')

                <!--back to top--->
                <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                    <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                    <span>Top</span>
                </a>
            </div>
        </div>
    </div>
    <script>
        $("div.alert").delay(3000).slideUp();
    </script>
</body>
</html>






