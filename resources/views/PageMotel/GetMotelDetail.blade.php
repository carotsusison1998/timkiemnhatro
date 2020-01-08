	
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
@extends('PageLayoutForDetail.master')
@section('content')
<style>
	#text{
		line-height: 25px;
		font-family: sans-serif;
	}
	#text:hover{
		cursor: pointer;
	}
	@media screen and (min-width: 800px){
		.map{
			width: 100%;
		}
	}
</style>
<section class="about-block">
	<div class="container">
		<div class="row">
			<!-- xảy ra lỗi sẽ hiển thị thông báo cho người dùng biết -->
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<script language="javascript" type="text/javascript">
					alert('Đã xảy ra lỗi trong quá trình đăng bình luận, vui lòng kiểm tra lại');
				</script>
				@foreach($errors->all() as $err)
				{{$err}} <br>
				@endforeach
			</div>
			@endif
			<!-- đăng kí thành công sẽ hiển thị thông báo cho người dùng biết -->
			@if(Session::has('thongbaothanhcong'))
			<div class="alert alert-success">
				<script language="javascript" type="text/javascript">
					alert('Thêm bình luận thành công');
				</script> 
				{{Session::get('thongbaothanhcong')}}
			</div>
			@endif
			@if(Session::has('thongbaoloi'))
			<div class="alert alert-danger">
				<script language="javascript" type="text/javascript">
					alert('Đăng nhập trước khi đặt phòng');
				</script> 
				{{Session::get('thongbaoloi')}}
			</div>
			@endif
			<div class="col-md-5 about-left">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
					<!-- Indicators -->
					<div class="carousel-inner">
						<div class="item active"> <img src="../vacayhome/images/banner.png" style="width:100%; height: 500px" alt="First slide">
							<div class="carousel-caption">
								<div id="logo">
									<!--<a href="{{route('page-home')}}"><img src="images/logo.png" alt="logo"></a>-->
									<a href="{{route('page-home')}}"><span>vacay</span>home</a>
								</div> 
							</div>
						</div>
						@foreach($image as $value)
						<div class="item"> <img src="../resources/UploadImage/ImageBoardingHouse/BoardingDetail/{{$value['image']}}" style="width:100%; height: 500px" alt="Second slide">
							<div class="carousel-caption">
								<div id="logo">
									<!--<a href="{{route('page-home')}}"><img src="images/logo.png" alt="logo"></a>-->
									<a href="{{route('page-home')}}"><span>vacay</span>home</a>
								</div> 
							</div>
						</div>
						@endforeach
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev"> 
						<img src="../vacayhome/images/icons/left-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/left-arrow-hover.png'" onmouseout="this.src = '../vacayhome/images/icons/left-arrow.png'" alt="left">
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<img src="../vacayhome/images/icons/right-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/right-arrow-hover.png'" onmouseout="this.src = '../vacayhome/images/icons/right-arrow.png'" alt="left">
					</a>
				</div>
			</div>
			<div class="col-md-7 about-right">
				<h3><a>Nhà Trọ {{$boardinghouse['name']}}</a></h3>
				<ul class="list-unstyled list-inline">
					<li style="background-color: #ff4157; border-radius: 30px; padding: 5px;">
						<b>Giá Thuê: {{$boardinghouse['price']}} Vnd</b>
					</li> <br>
					<li><i class="fa fa-map-marker"></i> Địa Chỉ: {!!$boardinghouse['address']!!}</li> <br>	
					<li>
						<?php 
						$owner = DB::table('Customer')->where('id', $boardinghouse['id_owner'])->first();
						?>
						<i class="fa fa-user"></i> Chủ Trọ: {{$owner->first_name}} {{$owner->last_name}} <br>
					</li> <br>
					<li><i class="fa fa-phone"></i> Số Điện Thoại:  {{$owner->phone}}</li> <br>
					<li>
						<?php 
						$type = DB::table('Type_BoardingHouse')->where('id', $boardinghouse['id_type_boardinghouse'])->first();
						?>
						<i class="fa fa-bars"></i> Loại: {{$type->name}}
					</li> <br>
					<li>
						<?php 
						$area = DB::table('street')->where('id', $boardinghouse['id_street'])->first();
						?>
						<i class="fa fa-location-arrow"></i> Khu Vực: {{$area->name}}
					</li> <br>
					<li><i class="fa fa-anchor"></i> Diện Tích: {{$boardinghouse['acreage']}}</li> <br> <br>
					<b>
						@if($boardinghouse['status'] != 1)
						<button class="btn btn-success" disabled="">
							Phòng Đã Được Đặt Bởi Người Khác
						</button>
						@elseif($boardinghouse['status'] == 1)
						<button class="btn btn-success">
							<a href="{{url('order-boardinghouse', $boardinghouse['id'])}}">Đặt Phòng</a>
						</button>
						@endif
					</b>
				</ul>
				<ul>
					<span>Mô Tả Chi Tiết:</span> <br>
					<textarea name="" id="text"  rows="15" style="max-width: 100%; min-width: 100%; min-height: 100%; min-height:200px;">{{$boardinghouse->description}}
					</textarea>
				</ul>
			</div>
		</div>
		<div class="clearfix"><br></div>
		<div class="clearfix"><br></div>
		<h3>Đánh Giá ({{count($comment)}})</h3>
		<div class="container">
			<div class="col-md-12 col-sm-8 col-xs-12">
				@foreach($comment as $value)
				<div class="container"  style="border: 0.5px solid #B2A2A2">
					<div class="row">
						<?php $name = DB::table('Customer')->where('id', $value['id_customer'])->first(); ?>

						@if(!$name->image == 'null')
						<img class="clearfix" style="width: 60px; height: 60px; background-color: black; border-radius: 45px">
						@else
						<img src="../vacayhome/images/banner3.png" width="60px" height="60px"  title="personal image" style="border-radius: 45px">
						@endif

						<?php 
						$name = DB::table('Customer')->where('id', $value['id_customer'])->first();
						?>
						{{$name->first_name}} {{$name->last_name}}
						<div class="btn-group" data-toggle="buttons">
							@if($value->star == 1)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="1" name="star" disabled="">1 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 2)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="2" name="star" disabled="">2 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 3)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="3" name="star" disabled="">3 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 4)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="4" name="star" disabled="">4 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 5)
							<label class="btn btn-primary">
								<input type="checkbox" checked autocomplete="off" value="5" name="star" disabled="">5 <i class="fa fa-star"></i>
							</label>
							@endif							
						</div> <br>
						<p style="margin-left: 5%">{{$value->content}}</p> <br>

						<?php 
						$rep = DB::table('Rep_Comment_BoardingHouse')->where('id_comment_boardinghouse', $value['id'])->get();
						?>
						@foreach($rep as $values)
						<?php $names = DB::table('Customer')->where('id', $values->id_customer)->first(); ?>
						<div style="margin-left: 5%">
							<img class="clearfix" style="width: 60px; height: 60px; background-color: black; border-radius: 45px; ">
							{{$names->first_name}} {{$names->last_name}} <br>
							<p style="margin-left: 7%">{{$values->content}}</p> <br>
						</div>
						@endforeach
						<div>
							<form style="width: 100%;" method="post" action="{{route('repcomment-boardinghouse')}}" enctype="multipart/form-data" style="margin-top: 5%; z-index: 100">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="id_comment" value="{{$value->id}}">
								<div class="col">
									<textarea id="" col="30" style="width:100%;" rows="5" name="content" placeholder="viết trả lời ở đây........."></textarea>
								</div>
								@if(Auth::check())
								<button class="btn btn-success">Gửi</button>
								@else
								<button class="btn btn-success" disabled="" title="đăng nhập để trả lời bình luận">Gửi</button>
								@endif
							</form>
						</div>
					</div>
					<div class="clearfix"><br></div>
				</div>
				<br> <br> <br>
				@endforeach
			</div>
			<div class="col-md-6 col-sm-8 col-xs-12">
				<div class="clearfix"></div>
				<div class="single-bottom comment-form">
					<h3>Bình Luận</h3>
					<form action="{{route('comment-boardinghouse')}}" method="post" enctype="multipart/form-data">
						<div class="container">
							<div class="row">
								<div class="btn" data-toggle="buttons">
									<label class="btn btn-primary">
										<input type="checkbox" value="1" name="star">1 <i class="fa fa-star"></i>
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" value="2" name="star">2 <i class="fa fa-star"></i>
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" value="3" name="star">3 <i class="fa fa-star"></i>
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" value="4" name="star">4 <i class="fa fa-star"></i>
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" value="5" name="star">5 <i class="fa fa-star"></i>
									</label>
								</div>
							</div>
						</div>
						<input type="hidden" value="{{$boardinghouse->id}}" name="boardinghouse">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<textarea class="form-control" placeholder="viết bình luận ở đây...." required="" name="content"></textarea>
						@if(Auth::check())
						<input type="submit" class="submit-btn" value="Gửi Bình Luận">
						@else
						<input type="submit" class="submit-btn" value="Gửi Bình Luận" disabled="" title="Đăng nhập trước khi bình luận">
						@endif
					</form>
				</div>
			</div>
		</div>
	</div>
	<section class="offspace-70">
		<div class="map">
			<div class="container">
				<div id="sethPhatMap" class="map" style="border:0; width: 100%; height: 400px" allowfullscreen></div>
			</div>
		</div>
	</section>

	<!----resort-overview--->
	<section class="resort-overview-block">
		<div class="container">
			<h3> Nhà Trọ Cung Chu</h3>
			<div class="row">
				@foreach($motelofid as $value)
				<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right" style="padding-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div  class="img-responsive" style="">
								<a href="{{url('motel-detail', $value->id)}}">
									<img src="../resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$value->image}}"  alt="image" class="img-rounded" width="300px" height="300px">
								</a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<h3><a href="{{url('motel-detail', $value->id)}}">Nhà Trọ: {{$value->name}}</a></h3> <br>
							<h4><p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 5px;">
								Giá Phòng: {{$value->price}}<b> Vnd
								</p>
							</h4> <br>  
							<p><li>Diện Tích: {{$value->acreage}}</li></p>
							<p><b><li>Địa Chỉ: {{$value->address}}</li></b></p>
							<p><b><li>
								<?php 
	                            $date = date_create($value->created_at);
	                            $d = date_format($date, 'd-m-Y');
	                            $c = date_format($date, 'H:i');
	                            ?>
	                            Thời Gian Đăng: <br> Lúc {{$c}} Ngày {{$d}}
							</li></b></p> <br>
							<!-- <div class="links">
								<a href="" style="border-radius: 30px">Chi Tiết</a>
								@if($value->status != 1)
								<button class="btn btn-success" disabled=""  style="border-radius: 30px; background-color: #2FF95A">
									<b title="phòng đã được đặt bởi người khác">Hết Phòng</b>
								</button>
								@elseif($value->status == 1)
								<a href="route('order-boardinghouse', $value['id'])" style="border-radius: 30px; background-color: #2FF95A">Đặt Phòng</a>
								@endif
							</div> -->
						</div>
					</div>
				</div>
				<div class="clear"></div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- end -->

	
</section>
@endsection

<script type="text/javascript">

	$a = {!!$boardinghouse['lng']!!};
	$b = {!!$boardinghouse['lat']!!};;
	var mapObj = null;
    var defaultCoord = [10.045162, 105.746857]; // coord mặc định, 9 giữa Can tho
    var zoomLevel = 10;
    var mapConfig = {
        attributionControl: false, // để ko hiện watermark nữa
        center: defaultCoord, // vị trí map mặc định hiện tại
        zoom: zoomLevel, // level zoom
    };
    
    window.onload = function() {
        // init map
        mapObj = L.map('sethPhatMap', {attributionControl: false}).setView(defaultCoord, zoomLevel);
        
        // add tile để map có thể hoạt động, xài free từ OSM
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        	attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapObj);
        // var marker = L.marker([10.04687 ,105.76810]).addTo(mapObj);
        // var marker = L.marker([10.04607 ,105.76908]).addTo(mapObj);
        var marker = L.marker([$b ,$a]).addTo(mapObj);
        
        // tạo popup và gán vào marker vừa tạo
        var popup = L.popup();
        popup.setContent("Vị trí nhà trọ: <b>{{$boardinghouse['name']}}</b> <br> {{$boardinghouse['address']}}");
        marker.bindPopup(popup);
    };
</script>
