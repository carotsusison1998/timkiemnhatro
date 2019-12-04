@extends('master')
@section('content')
<!--dinning-->
<section class="blog">
	<div class="container">
		<div class="row">
			<aside class="col-md-3 col-sm-12 col-xs-12">
				<div class="blog-list">
					<h4>Thể Loại</h4>
					<ul>
						@foreach($type_boardinghouse as $value)
						<li><a href="{{route('motel-type', $value['id'])}}"><i class="fa fa-caret-right"> </i>{{$value['name']}}</a></li>
						@endforeach
					</ul>

					<div class="clearfix"> </div>
				</div>
				<div class="blog-list">
					<h4>BỘ LỌC</h4>
					<ul>
						<li><a href="{{route('motel-filter', 'price=1')}}"><i class="fa fa-caret-right"> </i>Nhà Trọ Trên 2 Triệu</a></li>
						<li><a href="{{route('motel-filter', 'price=2')}}"><i class="fa fa-caret-right"> </i>Nhà Trọ 1 Triệu Đến 2 Triệu</a></li>
						<li><a href="{{route('motel-filter', 'price=3')}}"><i class="fa fa-caret-right"> </i>Nhà Trọ Dưới 1 Triệu</a></li>
						<li><a href="{{route('motel-filter', 'price=4')}}"><i class="fa fa-caret-right"> </i>Nhà Trọ Dưới 800 Triệu</a></li>
					</ul>
				</div>
				<div class="blog-list1">
					<h4>Popular Posts</h4>
					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="../public/vacayhome/images/icons/car.png" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="../public/vacayhome/images/icons/car.png" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="../public/vacayhome/images/icons/car.png" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="../public/vacayhome/images/icons/car.png" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</aside>
			<div class="col-md-9 col-sm-12 col-xs-12">
				@if(count($boardinghouse) > 0)
				@foreach($boardinghouse as $value)
				<div class="col-md-9 col-sm-12 col-xs-12 remove-padd-left" style="padding-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div  class="img-responsive" style="">
								<a href="{{url('motel-detail', $value['id'])}}">
									<img src="./resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$value['image']}}"  alt="image" class="img-rounded" width="300px" height="300px">
								</a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<h3><a href="{{url('motel-detail', $value['id'])}}">Nhà Trọ: {{$value['name']}}</a></h3> <br>
							<h4><p style="background-color: #ff4157; border-radius: 30px; padding: 5px">
								Giá Phòng: <b>{{number_format($value['price'])}} Vnd
								</p>
							</h4> <br>  
							<p><li>Diện Tích: 25m2</li></p>
							<p><b><li>Địa Chỉ: {{$value['address']}}</li></b></p>
							<p><b><li>
								<?php 
								$date = date_create($value['created_at']);
								$d = date_format($date, 'd-m-Y');
								$c = date_format($date, 'H:i');
								?>
								Thời Gian Đăng: <br> Lúc {{$c}} Ngày {{$d}}
							</li></b></p> <br>
							<div class="links">
								<a href="{{url('motel-detail', $value['id'])}}" style="border-radius: 30px">Chi Tiết</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				@endforeach
				@else
				<div class="alert alert-success">
					chưa có nhà trọ bạn muốn
				</div>
				@endif
			</div>
		</div>
	</div>
</section>
<!--end-->

@endsection