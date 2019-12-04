<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kênh Bán Hàng</title>
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
    background-color: #f1f1f1;
            
        }
    </style>
</head>
<body>
	<div id="page">
		<!---header top---->
		<div class="top-header">
			<div class="container">
				@include('PageSaleChannel.header')
				<div class="clearfix"></div>				
				<div class="container">
					<div class="col-md-3">
						@include('PageSaleChannel.personal2')
					</div>
					<div class="col-md-9" style="border-left: 1px solid black">
						@yield('content')
					</div>
				</div>
				<div class="clearfix"></div>			
				<!---footer--->
				@include('footer')
				<!-- end-footer -->
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