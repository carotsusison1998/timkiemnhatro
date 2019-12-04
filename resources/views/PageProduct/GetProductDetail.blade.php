@extends('PageLayoutForDetail.master')
@section('content')
<style>
	.about-right p{
		border-bottom: 1px solid #ff4157;
	}
</style>
<section class="about-block">
	<div class="container">
		<div class="row">
			<div class="col-md-8 about-left">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php $dem = count($image_detail); ?>
						@for($i=0; $i < $dem; $i++)
						<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
						@endfor
					</ol>
					<div class="carousel-inner">
						<div class="item active"> <img src="../vacayhome/images/banner.png" style="width:100%; height: 500px" alt="First slide">
							<div class="carousel-caption">
								<h1>vacayhome<br> Mua Sản Phẩm Siêu Nhanh</h1>
							</div>
						</div>
						@foreach($image_detail as $value)
						<div class="item"> <img src=".././resources/UploadImage/ImageProduct/ProductDetail/{{$value['image']}}" style="width:100%; height: 500px" alt="Second slide">
							<div class="carousel-caption">
								<h1>vacayhome<br> Mua Sản Phẩm Siêu Nhanh</h1>
							</div>
						</div>
						@endforeach
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev"> 
						<img src="../vacayhome/images/icons/left-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/left-arrow-hover.png'" onmouseout="this.src = './.vacayhome/images/icons/left-arrow.png'" alt="left">
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<img src="../vacayhome/images/icons/right-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/right-arrow-hover.png'" onmouseout="this.src = '../vacayhome/images/icons/right-arrow.png'" alt="left">
					</a>
				</div>
			</div>
			<div class="col-md-4 about-right">
				<h3>{{$product_detail['name']}}</h3>
				@if($product_detail['sale'] == 0)
				<p>Giá: <b>{{number_format($product_detail['price'])}} Vnd</b></p>
				@else
				<p style="text-decoration: line-through; color: #ff4157">Giá: <b>{{number_format($product_detail['price'])}} Vnd</b></p>
				<p>Giá Khuyến Mãi: <b>{{number_format($product_detail['sale'])}} Vnd</b></p>
				@endif
				<ul class="list-unstyled list-inline">
					<li>Sed vitae facilisis nisi, in finibus lacus. Duis vel nulla orci.</li>
					<li>fringilla, at ultrices felis dignissim. Integer ultricies posuere odio</li>
					<li>Sed vestibulum mattis laoreet. Donec sollicitudin justo luctus nulla consectetur</li>
					<li>Nam dolor tellus, dictum sit amet libero eu, semper placerat massa.</li>
					<li>consectetur tempor quam, aliquam dignissim diam hendrerit nec. Cras sodales at nisl</li>
				</ul>
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
			</div>
		</div>
		<div class="clearfix"><br></div>
		<div class="container">
			<div class="col-md-12 col-sm-8 col-xs-12">
				<span>
					<img src="./vacayhome/images/banner3.png" width="60px" height="60px"  title="personal image" style="border-radius: 45px">

					<span>Duy</span> 
					<div> <br>
						<span>nhà trọ an toàn, dể tìm</span> <br>
						<button class="btn-success">Trả lời</button>
					</div>
				</span> <br> <br> <br>
				<span>
					<img src="./vacayhome/images/banner3.png" width="60px" height="60px"  title="personal image" style="border-radius: 45px">

					<span>Duy</span> 
					<div> <br>
						<span>nhà trọ an toàn, dể tìm</span> <br>
						<button class="btn-success">Trả lời</button>
					</div>
				</span> <br> <br> <br>

			</div>	 

			<div class="col-md-6 col-sm-8 col-xs-12">
				<div class="clearfix"></div>
				<div class="single-bottom comment-form">
					<h3>Leave your Comment</h3>
					<form action="#" method="post">
						<textarea class="form-control" name="Message" placeholder="Message Here...." required=""></textarea>
						<input type="submit" class="submit-btn" value="Send">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection