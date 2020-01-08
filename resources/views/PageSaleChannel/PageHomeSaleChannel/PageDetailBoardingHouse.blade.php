	@extends('PageSaleChannel.master')
	@section('content')
	<section>
		@if(Session::has('thongbao'))
			<div class="alert alert-success">
				{{Session::get('thongbao')}}
			</div>
		@endif
		<h3 class="text-center">Chi Tiết Nhà Trọ: {{$detail_boarding['name']}}</h3>
		<button class="btn btn-success">
			<a href="{{route('hrm-boardinghouse', $customer['id'])}}"  style="color: white"><b>Trở về</b></a>
		</button>
		<fieldset class="form-group">
			<label for="exampleInputEmail1">Tên Nhà Trọ</label>
			<input type="text" class="form-control" id="exampleInputEmail1" disabled="" value="{{$detail_boarding['name']}}" placeholder="tên nhà trọ" name="name">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Giá Nhà Trọ</label>
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="{{$detail_boarding['price']}}" placeholder="giá nhà trọ" name="price">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Khu Vực</label>
			<?php 
			$data = DB::table('street')->where('id',$detail_boarding['id_street'])->first();
			?>
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="{{$data->name}}" placeholder="giá nhà trọ" name="price">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Loại Nhà Trọ</label>
			<?php 
			$data = DB::table('Type_BoardingHouse')->where('id',$detail_boarding['id_type_boardinghouse'])->first();
			?>
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="{{$data->name}}" placeholder="giá nhà trọ" name="price">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Trạng Thái</label>
			@if($detail_boarding['price']==0)
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="hết phòng" placeholder="giá nhà trọ" name="price">
			@else
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="còn phòng" placeholder="giá nhà trọ" name="price">
			@endif
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Mô Tả Về Nhà Trọ</label>
			<textarea class="form-control" id="exampleTextarea" rows="3" disabled="" name="description">{{$detail_boarding['description']}}
			</textarea>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Diện Tích</label> <br>
			<input type="text"  class="form-control" value="{{$detail_boarding['acreage']}} m2" disabled=""> <br>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Gác Lửng</label>
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="{{$detail_boarding->type}}" placeholder="giá nhà trọ" name="price">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Ảnh Nền Nhà Trọ</label>
			<img src="../resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$detail_boarding['image']}}" alt="" width="150px" height="150px">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Ảnh Chi Tiết Nhà Trọ</label>
			<?php 
			$data = DB::table('Image_BoardingHouse')->where('id_boardinghouse',$detail_boarding['id'])->get();
			$dem = count($data);
			?>
			@if($dem > 0)
			@foreach($data as $value)
			<img src="../resources/UploadImage/ImageBoardingHouse/BoardingDetail/{{$value->image}}" alt="" width="150px" height="150px">
			@endforeach
			@else
			<br>
			<span>Chưa có ảnh chi tiết</span>
			@endif
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Người đặt phòng</label>
			<input type="text" class="form-control" id="exampleInputPassword1" disabled="" value="{{$customers['first_name']}} {{$customers['last_name']}}" placeholder="giá nhà trọ" name="price"> <br>
			@if($customers)
			<div class="text-center">
				@if($detail_boarding['status'] == 1)
					<h3 class="text-center">Phòng chưa ai đặt</h3>	
				@elseif($detail_boarding['status'] == 2)
					<h2 class="text-center">Xác nhận chủ trọ</h2>
					<form action="{{route('confirm-boardinghouse2')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="id_boar" value="{{$detail_boarding['id']}}">
						<button class="btn btn-danger">Hủy</button>
					</form>
					<form action="{{route('confirm-boardinghouse')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="id_boar" value="{{$detail_boarding['id']}}">
						<button class="btn btn-success">Xác nhận</button>
					</form>
				@elseif($detail_boarding['status'] == 3)
					<h3 class="text-center">Phòng được đặt thành công</h3>
				@elseif($detail_boarding['status'] == 4)
					<h3 class="text-center">Phòng được hủy</h3>
				
				@endif
			</div>
			@else
			<h3 class="text-center">Chưa ai đặt</h3>
			@endif
		</fieldset>
	</section>
	@endsection