	@extends('PageSaleChannel.master')
	@section('content')
	<section>
		<h3 class="text-center">Chi Tiết Nhà Trọ: {{$detail_boarding['name']}}</h3>
		@if(count($errors) > 0)
		@foreach($errors->all() as $err)
		<div class="alert alert-warning">
			{{$err}}
		</div>
		@endforeach
		@endif
		@if(Session::has('thongbao'))
		<div class="alert alert-success">{{Session::get('thongbao')}}</div>
		@endif
		<button class="btn btn-success">
			<a href="{{route('hrm-boardinghouse', $customer['id'])}}"  style="color: white"><b>Trở về</b></a>
		</button>
		<form action="{{route('update-boardinghouse')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="id" value="{{$detail_boarding['id']}}">
			<fieldset class="form-group">
				<label for="exampleInputEmail1">Tên Nhà Trọ</label>
				<input type="text" class="form-control" id="exampleInputEmail1"  value="{{$detail_boarding['name']}}" placeholder="tên nhà trọ" name="name">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Giá Nhà Trọ</label>
				<input type="text" class="form-control" id="exampleInputPassword1"  value="{{$detail_boarding['price']}}" placeholder="giá nhà trọ" name="price">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Diện Tích</label>
				<input type="text" class="form-control" id="exampleInputPassword1"  value="{{$detail_boarding['acreage']}}" placeholder="giá nhà trọ" name="acreage">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Khu Vực</label>
				<?php 
				$data = DB::table('Area')->where('id',$detail_boarding['id_area'])->first();
				?>
				<select class="form-control" id="eexampleSelect11" name="area">
					<option value="{{$detail_boarding['id_area']}}" selected="">{{$data->name}}</option>
					@foreach($area as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
				</select>
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
				<label for="exampleInputPassword1">Trạng Thái</label>
				<select class="form-control" id="eexampleSelect11" name="status">
					@if($detail_boarding['status'] == 1)
					<option value="1" selected="">Còn phòng</option>
					<option value="0">Hết phòng</option>
					@else
					<option value="1">Còn phòng</option>
					<option value="0" selected="">Hết phòng</option>
					@endif
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Gác Lửng</label>
				<select class="form-control" id="eexampleSelect11" name="type">
					@if($detail_boarding['type'] === "Có Gác")
					<option value="Có Gác" selected="">Có Gác</option>
					<option value="Không Gác">Không Gác</option>
					@elseif($detail_boarding['type'] === "Không Gác")
					<option value="Có Gác">Có Gác</option>
					<option value="Không Gác" selected="">Không Gác</option>
					@else
					<option value="Có Gác">Có Gác</option>
					<option value="Không Gác">Không Gác</option>
					@endif
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Địa Chỉ Nhà Trọ</label>
				<textarea class="form-control" id="exampleTextarea" rows="3" name="address">{{$detail_boarding['address']}}
				</textarea>
			</fieldset>
			<fieldset class="form-group">
				<a href="https://www.openstreetmap.org/export#map=19/10.04612/105.76814">Lấy vị trí</a> <br> <br>	
				<div class="col-sm-6" style="padding-left: 0px;">
					<input type="" class="form-control" placeholder="trục y" name="y" value="{{$detail_boarding['lng']}}">
				</div>
				<div class="col-sm-6"style="padding-right: 0px;">
					<input type="" class="form-control" placeholder="trục x" name="x" value="{{$detail_boarding['lat']}}">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Mô Tả Về Nhà Trọ</label>
				<textarea class="form-control" id="exampleTextarea" rows="3" name="description">{{$detail_boarding['description']}}
				</textarea>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Ảnh Nền Nhà Trọ</label> <br>
				<img src="../resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$detail_boarding['image']}}" alt="" width="150px" height="150px">
				<a href="" title="xóa">
					<i class="fa fa-window-close"  style="position: relative; top: -65px; right: 21px"></i>
				</a>
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
					<input type="file" name="picture[]">
				</div>
				<button type="button" class=" btn btn-primary" id="addImage">Thêm Ảnh</button>
				@else
				<div class="form-group" id="insert">
					<label>Thêm Ảnh Chi Tiết</label>
					<input type="file" name="picture[]">
				</div>
				<button type="button" class=" btn btn-primary" id="addImage">Thêm Ảnh</button>
				<br>
				<span>Chưa có ảnh chi tiết</span>
				@endif
			</fieldset>
			<button class="btn btn-success center-block">Cập Nhật</button>
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
	</script>