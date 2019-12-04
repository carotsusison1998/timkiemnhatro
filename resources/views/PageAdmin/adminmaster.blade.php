<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang Quản Trị</title>
    <link href="./vacayhome/css/bootstrap.min.css" rel="stylesheet">
    <link href="./vacayhome/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="./vacayhome/css/style.css" rel="stylesheet">
    <link href="./vacayhome/fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
    <link href="./vacayhome/css/lightbox.min.css" rel="stylesheet">
    <link href="./vacayhome/css/responsive.css" rel="stylesheet">
    <script src="./vacayhome/js/jquery.min.js" type="text/javascript"></script>
    <script src="./vacayhome/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./vacayhome/js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
    <script src="./vacayhome/js/instafeed.min.js" type="text/javascript"></script>
    <script src="./vacayhome/js/custom.js" type="text/javascript"></script>
    <style>
        body{
            background: #B0E6DE;
            
        }
    </style>
</head>
<body>
    <!---header top---->
    <div style="padding-top: 30px;">
        <div class="col-md-3">
            <section>
                <div class="row" style="margin-left: 9px; font-size: 20px">
                    <ul>
                        <a href="{{route('admin')}}"><span><b>Xin Chào: Admin</b></span></a> <br> <br>
                    </ul>
                    <div class="clearfix"></div>

                    <ul>
                        <a href="{{route('type')}}"><b>Quản Lí Thể Loại</b></a> <br> <br>
                    </ul>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <ul>
                        <a href="{{route('area')}}"><b>Quản Lí Khu Vực</b></a> <br> <br>
                    </ul>
                    <div class="clearfix"></div>

                </div>
            </section>
        </div>
        <div class="col-md-6" style="border-left: 1px solid black">
            @yield('contents')
        </div>
    </div>
</body>
</html>