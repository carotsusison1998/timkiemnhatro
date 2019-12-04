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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="../vacayhome/images/icons/favicon.png"/>
    <title>vacayhome</title>

    <!-- Bootstrap core CSS -->
    <link href="../vacayhome/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vacayhome/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="../vacayhome/css/style.css" rel="stylesheet">
    <link href="../vacayhome/fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="../vacayhome/css/lightbox.min.css">
    <link href="../vacayhome/css/responsive.css" rel="stylesheet">
    <script src="../vacayhome/js/jquery.min.js" type="text/javascript"></script>
    <script src="../vacayhome/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../vacayhome/js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
    <script src="../vacayhome/js/instafeed.min.js" type="text/javascript"></script>
    <script src="../vacayhome/js/custom.js" type="text/javascript"></script>
    <style>
        body{
    background-color: #f1f1f1;
            
        }
    </style>
</head>
<body>
    <div id="page">
        <!---header top---->
        <div class="top-header">
            <div class="container">
                @include('PageLayoutForDetail.header')
                <div class="clearfix"></div>
                <div class="container-fluid">
                @yield('content')
                </div>
                <!---footer--->
                @include('PageLayoutForDetail.footer')

                <!--back to top--->
                <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                    <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                    <span>Top</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
