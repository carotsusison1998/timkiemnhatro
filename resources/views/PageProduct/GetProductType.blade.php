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
						@foreach($type as $value)
						<li><a href="{{route('product-type', $value['id'])}}"><i class="fa fa-caret-right"> </i>{{$value['name']}}</a></li>
						@endforeach					
					</ul>
					<div class="clearfix"> </div>
				</div>
			</aside>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<h3>Loại Sản Phẩm: {{$typename->name}}</h3>
				@foreach($product as $value)
				<div class="col-md-9 col-sm-12 col-xs-12 remove-padd-left" style="padding-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div  class="img-responsive" style="">
								<a href="{{url('product-detail', $value['id'])}}">
									<img src="../resources/UploadImage/ImageProduct/ProductAvatar/{{$value['image']}}"  alt="image" class="img-rounded" width="300px" height="300px">
								</a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<p class="name"><a href="{{url('product-detail', $value['id'])}}"><b>{{$value['name']}}</b></a></p> <br>
							@if($value['sale'] == '0')
							<h4><p style="background-color: #ff4157; margin-top: 8px; border-radius: 30px; padding: 5px">
								Giá: <b>{{number_format($value['price'])}} Vnd
								</p>
							</h4> <br>  
							@else
							<h4><p style=" border-radius: 30px; padding: 5px; text-decoration: line-through;">
								Giá: <b>{{number_format($value['price'])}} Vnd
								</p>
								<p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 5px;">
								Giá Sale: <b>{{number_format($value['sale'])}} Vnd
								</p>
							</h4> <br> 
							@endif 
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
								<a href="{{url('product-detail', $value['id'])}}" style="border-radius: 30px">Chi Tiết</a>
								<a href="{{route('shoppingcart', [$value['id'], $value['name']])}}" id="carts2"></i>Mua Ngay</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clear"></div>
			</div>
		</div>
		<div class="container">
			<div class="row" style="height: 10px; margin-left: 35%">{{$product->links()}}</div>
		</div>
	</div>
</section>
<!--end-->
@endsection