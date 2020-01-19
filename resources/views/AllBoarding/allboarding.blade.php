@extends('PageLayoutForDetail.master')
@section('content')
<!--  -->
<style>
	body{
		font-family: sans-serif;
	}
	#id1{
		border-left: 1px solid #8D8787;
		border-right: 1px solid #8D8787;
		border-bottom: 1px solid #8D8787;
		border-radius: 5px;
		padding-bottom: 10px;
	}
	#id2{
		border-left: 1px solid #8D8787;
		border-right: 1px solid #8D8787;
		border-bottom: 1px solid #8D8787;
		border-radius: 5px;
		padding-bottom: 10px;
		margin-top: 20px;
	}
	#id2 #id22{
		margin-top: 50px;
	}
	#id1 h3{
		color: #eee;
		border: 1px solid #8D8787;
		padding: 10px;
		background: #333;
		border-radius: 5px
	}
	#id2 #p1{
		color: #eee;
		border: 1px solid #8D8787;
		padding: 10px;
		background: #333;
		border-radius: 5px
	}
	#content{
		padding-top: 10px;
		padding-bottom: 10px;
	}
	#content div span{
		margin-left: 5px;
	}
	.cl img{
		border-radius: 50%;
		border: 1px solid black;
		margin-left: 20%;
	}

	@media only screen and (max-width: 374px){
		.cl img {
			margin:50px;

		}
	}
</style>
<!--  -->
<!----resort-overview--->
<section class="resort-overview-block">
	<div class="container">
		<div class="row" id="id1">
			<h3>Chủ Trọ: {{$owner->first_name}} {{$owner->last_name}}</h3>
			<div id="content">
				<div class="col-sm-4 cl">
					<img src="./../resources/UploadImage/Image/{{$owner->image}}" alt="">
				</div>
				<div class="col-sm-8">
					<span><li>Số điện thoại: <b>{{$owner->phone}}</b></li></span>
					<span><li>Số điện thoại: <b>{{$owner->address}}</b></li></span>
					<span><li>Số điện thoại: <b>{{$owner->email}}</b></li></span>
					<span><li>Số lượng phòng trọ đã đăng: <b>{{count($allboarding)}}</b></li></span>
					<span><li>Số lượng phòng trọ phòng hết: <b>{{$arg}}</b></li></span>
					<span><li>Số lượng phòng trọ còn phòng: <b>{{count($allboarding2)}}</b></li></span>
				</div>
			</div>
		</div>
		<div class="row" id="id2">
			<p id="p1">Danh Sách Nhà Trọ</p>
			@foreach($allboarding as $value)
			<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right" id="id22">
				<div class="side-A">
					<div class="product-thumb">
						<div  class="img-responsive" style="">
							<a href="{{url('motel-detail', $value['id'])}}">
								<img src="../resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$value['image']}}"  alt="image" class="img-rounded" width="300px" height="300px">
							</a>
						</div>
					</div>
				</div>
				<div class="side-B">
					<div class="product-desc-side">
						<h3><a href="{{url('motel-detail', $value['id'])}}">Nhà Trọ: {{$value['name']}}</a></h3> <br>
						<h4><p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 5px;">
							Giá Phòng: <b>{{$value['price']}} Vnd
							</p>
						</h4> <br>  
						<p><li>Diện Tích: {{$value['acreage']}}m2</li></p>
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
							@if($value['status'] != 1)
							<button class="btn btn-success" disabled=""  style="border-radius: 30px; background-color: #2FF95A">
								<b title="phòng đã được đặt bởi người khác">Hết Phòng</b>
							</button>
							@elseif($value['status'] == 1)
							<a href="{{route('order-boardinghouse', $value['id'])}}" style="border-radius: 30px; background-color: #2FF95A">Đặt Phòng</a>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			@endforeach			
		</div>
		<span class="text-center">{{$allboarding->links()}}</span>
	</div>
</section>
<!-- end -->
@endsection