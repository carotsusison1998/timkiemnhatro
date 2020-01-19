	@extends('PageSaleChannel.master')
	@section('content')
	<section>
		<h3 class="text-center">Chi Tiết Nhà Trọ: {{$detail_boarding['name']}}</h3>
		@if(Session::has('thongbao'))
		<div class="alert alert-success">{{Session::get('thongbao')}}</div>
		@endif
		<button class="btn btn-success">
			<a href="{{route('hrm-boardinghouse', $customer['id'])}}"  style="color: white"><b>Trở về</b></a>
		</button>
		<form action="{{route('update-boardinghouse')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> <br>
			<input type="hidden" name="id" value="{{$detail_boarding->id}}">
			<input type="hidden" name="status" value="{{$detail_boarding->status}}">
			<fieldset class="form-group">
				<?php 
					$street = DB::table('street')->where('id', $detail_boarding['id_street'])->first();
                    $wards = DB::table('wards')->where('id', $street->id_wards)->first();
                    $district = DB::table('district')->where('id', $wards->id_district)->first();
                    $areas = DB::table('area')->where('id', $district->id_area)->first();
				?>
				<label for="exampleInputPassword1">Địa Chỉ Chính Xác</label>
				<input type="text" class="form-control" name="address" placeholder="địa chỉ chính xác" value="{{$detail_boarding['number'] .', '.$street->name.', '.$wards->name.', '.$district->name.', '.$areas->name}}" disabled="">
			</fieldset>
			<fieldset class="form-group">
				<div class="col-sm-2" style="margin-left: -15px;">
					<label for="exampleInputEmail1">Khu Vực</label>
					<select class="form-control" id="area" name="area">
						<option value="">Chọn tỉnh/thành phố</option>
						@foreach($area as $value)
						<option value="{{$value['id']}}">{{$value['name']}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-2">
					<label for="exampleInputEmail1">Quận/Huyện</label>

					<select class="form-control" name="district" id="district">
						
					</select>
				</div>
				<div class="col-sm-3">
					<label for="exampleInputEmail1">Phường/Xã</label>
					<select class="form-control" name="wards" id="wards">
						
					</select>
				</div>
				<div class="col-sm-3">
					<label for="exampleInputEmail1">Đường</label>
					<select class="form-control" name="street" id="street">
						<input type="hidden" name="nostreet" value="{{$detail_boarding->id_street}}">
					</select>
				</div>
				<div class="col-sm-2" style="margin-left: 15px">
					<label for="exampleInputEmail1">Số Nhà</label>
					<input type="text" class="form-control" name="number" value="{{$detail_boarding->number}}">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Loại Nhà Trọ </label>
				<?php 
				$data = DB::table('Type_BoardingHouse')->where('id',$detail_boarding['id_type_boardinghouse'])->first();
				?>
				<select class="form-control" id="eexampleSelect11" name="id_type_boardinghouse">
					<option value="{{$detail_boarding['id_type_boardinghouse']}}" selected="">{{$data->name}}</option>
					@foreach($type_boardinghouse as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputEmail1">Tên Nhà Trọ</label>
				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên nhà trọ" name="name" value="{{$detail_boarding->name}}">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Giá Nhà Trọ</label>
				<input type="text" class="form-control" id="price" placeholder="giá nhà trọ" name="price" value="{{$detail_boarding->price}}">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Diện Tích</label>
				<input type="text" class="form-control" id="dientich" placeholder="diện tích nhà trọ" name="acreage" value="{{$detail_boarding->acreage}}">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Gác Lửng</label>
				<select class="form-control" id="eexampleSelect11" name="type">
					@if($detail_boarding->type == "Có Gác")
					<option value="Có Gác" selected="">Có Gác</option>
					<option value="Không Gác">Không Gác</option>
					@else
					<option value="Có Gác">Có Gác</option>
					<option value="Không Gác" selected="">Không Gác</option>
					@endif
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Đối Tượng</label>
				<select class="form-control" id="eexampleSelect11" name="object">
					@if($detail_boarding->object == "Cả hai")
					<option value="Cả hai" selected="">Cả hai</option>
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
					@elseif($detail_boarding->object == "Nam")
					<option value="Cả hai">Cả hai</option>
					<option value="Nam" selected="">Nam</option>
					<option value="Nữ">Nữ</option>
					@else
					<option value="Cả hai">Cả hai</option>
					<option value="Nam">Nam</option>
					<option value="Nữ" selected="">Nữ</option>
					@endif
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Mô Tả Về Nhà Nhà Trọ</label>
				<textarea class="form-control"  rows="15" name="description">{{$detail_boarding->description}}
				</textarea>
			</fieldset>
			<fieldset class="form-group">
				<!-- <a href="https://www.openstreetmap.org/export#map=19/10.04612/105.76814">Lấy vị trí trực tiếp trên maps</a> <br> <br>
				<div class="col-sm-6"  style="padding-left: 0px;">
					<input type="text" class="form-control" placeholder="vị trí trục tung y, ví dụ: 10,202135121" name="lon">
				</div>
				<div class="col-sm-6"  style="padding-right: 0px;">
					<input type="text" class="form-control" placeholder="vị trí trục hoạch x, ví dụ: 105,154531044" name="lat">
				</div> -->
				<input type="hidden" name="lat" value="{{$detail_boarding['lat']}}">
				<input type="hidden" name="lng" value="{{$detail_boarding['lng']}}">

				<input onclick="getLocation()" type="button" class="btn btn-danger" value="Lấy vị trí trực tiếp hiện tại"> <br> <br>
				<div class="col-sm-5">
					<p id="lat"></p>
				</div>
				<div class="col-sm-5">
					<p id="lon"></p>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Ảnh Chi Tiết Nhà Trọ</label> <br>
				<?php 
				$data = DB::table('Image_BoardingHouse')->where('id_boardinghouse',$detail_boarding['id'])->get();
				$dem = count($data);
				?>
				@if($dem > 0)
				@foreach($data as $value)
				<img src="../resources/UploadImage/ImageBoardingHouse/BoardingDetail/{{$value->image}}" alt="" width="150px" height="150px">
				<a href="{{route('deleteimage-boardinghouse', $value->id)}}" title="xóa">
					<i class="fa fa-window-close" style="position: relative; top: -65px; right: 21px; z-index: 200"></i>
				</a>
				@endforeach
				<br> <br>
				<div class="form-group" id="insert">
					<label>Thêm Ảnh Chi Tiết</label>
					<input type="file" name="picture[]" multiple="">
				</div>
				<button type="button" class=" btn btn-primary" id="addImage" >Thêm Ảnh</button>
				@else
				<div class="form-group" id="insert">
					<label>Thêm Ảnh Chi Tiết</label>
					<input type="file" name="picture[]" multiple="">
				</div>
				<button type="button" class=" btn btn-primary" id="addImage">Thêm Ảnh</button>
				<br>
				<span>Chưa có ảnh chi tiết</span>
				@endif
			</fieldset>

			<button type="submit" class="btn btn-primary">Thêm Nhà Trọ</button>
		</form>
	</section>
	@endsection
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javascript">
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
			document.getElementById("lat").innerHTML = '<input type="text" value="'+lat+'" name="lat"/>';
			document.getElementById("lon").innerHTML = '<input type="text" value="'+lon+'" name="lng"/>';
		}

		$(document).ready(function(){
			$('#area').change(function(){
				var id_district = $(this).val();
			// console.log(id_district);
			$.ajax({
				url: '{{route('getdistrict')}}',
				method: 'get',
				data: {id_district: id_district},
				success: function(data){
					$('#district').html(data);
					console.log(data);
				}
			});
		})

			$('#district').change(function(){
				var id_wards = $(this).val();
			// console.log(id_wards);
			$.ajax({
				url: '{{route('getwards')}}',
				method: 'get',
				data: {id_wards: id_wards},
				success: function(data){
					$('#wards').html(data);
					console.log(data);
				}
			});
		})


			$('#wards').change(function(){
				var id_street = $(this).val();
			// console.log(id_street);
			$.ajax({
				url: '{{route('getstreet')}}',
				method: 'get',
				data: {id_street: id_street},
				success: function(data){
					$('#street').html(data);
					console.log(data);
				}
			});
		})
			$('#price').change(function(){
				var price = $(this).val();
				$.ajax({
					url: '{{route('getmoney')}}',
					method: 'get',
					data: {price: price},
					success: function(data){
						$('#price').val(data);
						console.log(data);
					}
				});
			})

			$('#dientich').click(function(){
				$('#dientich').val('');
			})

			$('#dientich').change(function(){
				var dientich = $(this).val();
				$('#dientich').val(dientich+'m2');
			})

		})
	</script>