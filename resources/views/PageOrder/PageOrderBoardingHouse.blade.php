@extends('PageLayoutForDetail.master')
@section('content')
<section class="contact-block">
	<div class="container">
		@if(Session::has('messager'))
		<div class="alert alert-success">
			{{Session::get('messager')}}
		</div>
		@endif
		<div class="col-md-6 contact-left-block">
			<h3><span>Thông Tin </span> Đặt Phòng</h3>
			<p class="text-left">Nhà Trọ {{$boardinghouse['name']}}</p>
			<p class="text-left">Chủ Nhà Trọ: 
				<?php 
				$owner = DB::table('Customer')->where('id', $boardinghouse->id_owner)->first();
				?>{{$owner->first_name}} {{$owner->last_name}} <br>
			</p>
			<p class="text-left">Số Điện Thoại: {{$owner->phone}}</p>
			<p class="text-left">Giá Phòng: {{number_format($boardinghouse['price'])}} Vnd</p>

			<h3><span>Thông Tin </span> Khách Hàng</h3>
			<p class="text-left">Họ Và Tên: <span style="color: #ff4157">{{$customer->first_name}} {{$customer->last_name}}</span></p>
			<p class="text-left">Số Điện Thoại: {{$customer->phone}}</p>
			<p class="text-left">Địa Chỉ: {{$customer->address}}</p>
		</div>
		<div class="col-md-6 contact-form">
			<h3>Send a <span>Message</span></h3>
			<form action="{{route('order-boardinghouse')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="id_boar" value="{{$boardinghouse['id']}}">
				<input type="hidden" name="price" value="{{$boardinghouse['price']}}">
				<select name="payment" id="" class="form-control">
					<option>Thanh Toán Sau</option>
					<option>Đặt Cọc Giữ Phòng</option>
					<option>Chuyển Khoản Toàn Bộ</option>
					<option>Chuyển Khoản Một Nữa</option>
				</select>
				<textarea class="form-control" name="note" placeholder="Ghi Chú............"></textarea>
				<input type="submit" class="submit-btn" value="Đặt Phòng">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
@endsection