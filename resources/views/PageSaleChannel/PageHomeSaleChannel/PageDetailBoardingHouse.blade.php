<style>
	#id1{
		border-left: 1px solid #8D8787;
		border-right: 1px solid #8D8787;
		border-bottom: 1px solid #8D8787;
		border-radius: 5px;
		padding-bottom: 10px;
		margin-top: 10px;
	}
	#id1 h3{
		color: #eee;
		border: 1px solid #8D8787;
		padding: 10px;
		background: #333;
		border-radius: 5px;
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
	.cl span li{
		font-weight: bold;
		line-height: 25px;
	}
</style>
@extends('PageSaleChannel.master')
@section('content')
<section>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		{{Session::get('thongbao')}}
	</div>
	@endif
	<a href="{{route('hrm-boardinghouse', $customer['id'])}}"  style="color: white"><b><button class="btn btn-success">Trở về</button></b></a>
	<div class="row" id="id1">
		<h3>Chi tiết nhà trọ: {{$detail_boarding->name}}</h3>
		<div id="content">
			<div class="cl">
				<span><li>Giá cho thuê: <b>{{$detail_boarding->price}} VND</b></li></span>
				<?php 
				$street = DB::table('street')->where('id', $detail_boarding['id_street'])->first();
				$wards = DB::table('wards')->where('id', $street->id_wards)->first();
				$district = DB::table('district')->where('id', $wards->id_district)->first();
				$area = DB::table('area')->where('id', $district->id_area)->first();
                            // echo $area->name;
				?>
				<span><li>Địa chỉ: <b>{{$detail_boarding['number'].', '.$street->name.', '.$wards->name.', '.$district->name.', '.$area->name}}</b></li></span>
				<?php 
				$data = DB::table('Type_BoardingHouse')->where('id',$detail_boarding['id_type_boardinghouse'])->first();
				?>
				<span><li>Thể loại: <b>{{$data->name}}</b></li></span>
				<span><li>Loại: <b>{{$detail_boarding->type}}</b></li></span>
				<span><li>Đối tượng cho thuê: <b>{{$detail_boarding->object}}</b></li></span>
				<span><li>Diện tích: <b>{{$detail_boarding->acreage}}</b></li></span>
				<?php 
					$a = date_create($detail_boarding->created_at);
					$date = date_format($a,'d-m-Y');
				?>
				<span><li>Ngày đăng: <b>{{$date}}</b></li></span>
				<!-- <?php 
				$data = DB::table('Image_BoardingHouse')->where('id_boardinghouse',$detail_boarding['id'])->get();
				$dem = count($data);
				?>
				@if($dem > 0)
				@foreach($data as $value)
				<img src="../resources/UploadImage/ImageBoardingHouse/BoardingDetail/{{$value->image}}" alt="" width="200px" height="150px">
				@endforeach
				@else
				<br>
				<span>Chưa có ảnh chi tiết</span>
				@endif -->
				<div id="sethPhatMap" class="map" style="border:0; width: 100%; height: 200px" allowfullscreen></div>

			</div>
		</div>
	</div>
	<div class="row" id="id1">
		<h3>Thông tin chủ trọ</h3>
		<div id="content">
			<div class="cl">
				<?php 
				$owners = DB::table('customer')->where('id', $detail_boarding->id_owner)->first();
				?>
				<span><li>Chủ: {{$owners->first_name.' '.$owners->last_name}}</li></span>
				<span><li>Số điện thoại: {{$owners->phone}}</li></span>
			</div>
		</div>
	</div>
	<div class="row" id="id1">
		<h3>Người đặt phòng trọ: {{$detail_boarding->name}}</h3>
		<div id="content">
			@if($customers)
			<div class="col-sm-6 cl">
				<span><li>Họ và tên: <b>{{$customers->first_name.' '.$customers->last_name}}</b></li></span>
				<span><li>Số điện thoại: <b>{{$customers->phone}}</b></li></span>
				<span><li>Email: <b>{{$customers->email}}</b></li></span>
				<span><li>Thời gian đặt: <b>{{$booking->created_at}}</b></li></span>
			</div>
			@else
			<div class="col-sm-12">
				<span><li>Chưa ai đặt</li></span>
			</div>
			@endif
		</div>
	</div>
	@if($customers)
	<div class="row" id="id1">
		<h3>Thông tin xác nhận</h3>
		<div id="content">
			<div class="col-sm-12">
				@if($detail_boarding['status'] == 1)
				<h3 class="text-center">Phòng chưa ai đặt</h3>	
				@elseif($detail_boarding['status'] == 2)
				<form action="{{route('confirm-boardinghouse2')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="id_boar" value="{{$detail_boarding['id']}}">
					<button class="btn btn-danger form-control">Hủy</button>
				</form>
				<br>
				<form action="{{route('confirm-boardinghouse')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="id_boar" value="{{$detail_boarding['id']}}">
					<button class="btn btn-success form-control">Xác nhận</button>
				</form>
				@elseif($detail_boarding['status'] == 3)
				<div class="col-sm-12 cl">
					<span><li>Phòng đã được đặt thành công</li></span>
					<span><li>Họ và tên: <b>{{$customers->first_name.' '.$customers->last_name}}</b></li></span>
					<span><li>Số điện thoại: <b>{{$customers->phone}}</b></li></span>
					<span><li>Email: <b>{{$customers->email}}</b></li></span>
					
					@if($booking->date_in === "0000-00-00")
					<form action="{{route('date-in', $booking->id)}}" method="post">
						{{csrf_field()}}
						<input type="date" name="date_in" placeholder="nhập ngày vào ở">
						<button>Lưu</button>
					</form>
					@else
					<span><li>Ngày vào phòng: {{date_format(date_create($booking->date_in), "d/m/Y")}}</li></span>
					@endif
				</div>
				@elseif($detail_boarding['status'] == 4)
				<h3 class="text-center">Phòng được hủy</h3>
				@endif
			</div>
		</div>
	</div>
	@endif
</section>
@endsection

<script type="text/javascript">

	$a = {!!$detail_boarding['lng']!!};
	$b = {!!$detail_boarding['lat']!!};;
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
        popup.setContent("Vị trí nhà trọ: <b>{{$detail_boarding['name']}}</b> <br> {{$detail_boarding->number.', '.$street->name.', '.$wards->name.', '.$district->name.', '.$area->name}}");
        marker.bindPopup(popup);
    };
</script>