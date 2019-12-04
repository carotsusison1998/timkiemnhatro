@extends('PageSaleChannel.master2')
@section('content')
<section>
	<h2 class="text-center">Trang Thêm Nhà Trọ</h2>
	<div class="clearfix"><br></div>
	<button class="btn btn-success">
		<a href="{{route('hrm-boardinghouse', $customer['id'])}}"  style="color: white"><b>Trở về</b></a>
	</button>
	<div class="clearfix"><br></div>
	@if(count($errors)>0)
	<div class="alert alert-danger">
		<script language="javascript" type="text/javascript">
			alert('Đã xảy ra lỗi trong quá trình thêm mới, vui lòng kiểm tra lại');
		</script>
		@foreach($errors->all() as $err)
		{{$err}} <br>
		@endforeach
	</div>
	@endif
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		<script language="javascript" type="text/javascript">
			alert('Nhà trọ đã được thêm mới thành công');
		</script> 
		{{Session::get('thongbao')}}
	</div>
	@endif
	<form method="POST" action="{{route('insert-boardinghouse')}}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset class="form-group">
			<label for="exampleInputEmail1">Khu Vực</label>
			<select class="form-control" id="eexampleSelect11" name="area">
				@foreach($area as $value)
				<option value="{{$value['id']}}">{{$value['name']}}</option>
				@endforeach
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputEmail1">Tên Nhà Trọ</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên nhà trọ" name="name">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Giá Nhà Trọ</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="giá nhà trọ" name="price">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Diện Tích</label>
			<input type="number" class="form-control" id="exampleInputPassword1" placeholder="diện tích nhà trọ" name="acreage">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Gác Lửng</label>
			<select class="form-control" id="eexampleSelect11" name="type">
				<option value="Có Gác">Có Gác</option>
				<option value="Không Gác">Không Gác</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Địa Chỉ Nhà Trọ</label>
			<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="địa chỉ nhà trọ" name="address"></textarea>
		</fieldset>
		<fieldset class="form-group">
			<a href="https://www.openstreetmap.org/export#map=19/10.04612/105.76814">Lấy vị trí trực tiếp trên maps</a> <br> <br>
			<div class="col-sm-6"  style="padding-left: 0px;">
				<input type="text" class="form-control" placeholder="vị trí trục tung y, ví dụ: 10,202135121" name="lon">
			</div>
			<div class="col-sm-6"  style="padding-right: 0px;">
				<input type="text" class="form-control" placeholder="vị trí trục hoạch x, ví dụ: 105,154531044" name="lat">
			</div>
			<!-- <input onclick="getLocation()" type="button" class="btn btn-danger" value="Lấy vị trí trực tiếp hiện tại"> <br> <br>
			<div class="col-sm-5">
				<p id="lat"></p>
			</div>
			<div class="col-sm-5">
				<p id="lon"></p>
			</div> -->
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleSelect1">Trạng Thái</label>
			<select class="form-control" id="eexampleSelect11" name="status">
				<option value="1">Còn phòng</option>
				<option value="0">Hết phòng</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleSelect1">Loại Phòng Trọ</label>
			<select class="form-control" id="eexampleSelect11" name="type_boardinghouse">
				@foreach($type_boardinghouse as $value)
				<option value="{{$value['id']}}">{{$value['name']}}</option>
				@endforeach
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Mô Tả Về Nhà Nhà Trọ</label>
			<textarea class="form-control" id="exampleTextarea" rows="10" name="description">
				- Giá tiền điện:
				- Giá tiền nước:
				- Tiền cọc:
				- Wifi:
				- Nam nữ ở chung:
				- Giờ Mở cửa, đóng cửa:
				- Số lượng người có thể ở:
				- Đối tượng cho thuê: 
				- Mô tả khác:

			</textarea>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-5" style="border-right: 1px solid black">
				<label for="exampleInputFile">Ảnh Chi Tiết Của Nhà Trọ</label>
				<div class="form-group" id="insert"><label>Tải Ảnh Lên</label><input type="file" name="picture[]" multiple=""></div>
				<button type="button" class=" btn btn-primary" id="addImage">
					Thêm Ảnh
				</button>
			</div>
			<div class="col-sm-5">
				<label for="exampleInputFile">Ảnh Đại Diện Của Nhà Trọ</label>
				<input type="file" class="form-control-file" id="exampleInputFile" name="image">
			</div>
		</fieldset>
		<button type="submit" class="btn btn-primary">Thêm Nhà Trọ</button>
	</form>
</section>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$("#addImage").click(function(){
			$("#insert").append('</br><div class="form-group"><label>Tải Ảnh Lên</label><input type="file" name="picture[]"></div>');
		});
	});
	
	var x = document.getElementById("demo");

	function getLocation() {
		if (navigator.geolocation) 
		{
			navigator.geolocation.getCurrentPosition(showPosition);
		} 
		else 
		{ 
			alert("Geolocation is not supported by this browser.");
		}
	}

	function showPosition(position) {
		var lat = position.coords.latitude;
		var lon = position.coords.longitude;
		document.getElementById("lat").innerHTML = '<input type="text" value="'+lat+'" />';
		document.getElementById("lon").innerHTML = '<input type="text" value="'+lon+'" />';
	}

</script>