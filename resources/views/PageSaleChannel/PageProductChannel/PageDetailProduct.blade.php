<style>
	body{
		font-family: 'Lato', sans-serif;
	}
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
	<a href="{{route('hrm-product', $customer['id'])}}"  style="color: white"><b><button class="btn btn-success">Trở về</button></b></a>
	<div class="row" id="id1">
		<h3>Chi tiết sản phẩm: {{$product->name}}</h3>
		<div id="content">
			<div class="cl">
				<span><li>Giá: <b>{{$product->price}} VND</b></li></span>
				@if($product->sale == '0')
				<span><li>Giá Khuyến mãi: <b> Chưa có</b></li></span>
				@else
				<span><li>Giá Khuyến mãi: <b>{{$product->sale}} VND</b></li></span>
				@endif
				<span><li>Số Lượng: <b>{{$product->quantity}}</b> sản phẩm</li></span>
				<?php 
					$type = DB::table('type_product')->where('id', $product->id_typeproduct)->first();
				?>
				<span><li>Thể Loại: <b>{{$type->name}}</b></li></span>
				@if($product->status == '1')
				<span><li>Trạng Thái: <b>đang bán</b></li></span>
				@else
				<span><li>Trạng Thái: <b>dừng bán</b></li></span>
				@endif
				<span><li>Mô Tả: <b>{{$product->description}}</b></li></span>
				<?php 
					$a = date_create($product->created_at);
					$date = date_format($a,'d-m-Y');
				?> 
				<span><li>Ngày đăng: <b>{{$date}}</b></li></span>
			</div>
		</div>
	</div>
	<div class="row" id="id1">
		<h3>Thông tin đơn hàng sản phẩm</h3>
		<div id="content">
			<div class="cl">
				<!-- <?php 
				//$owners = DB::table('customer')->where('id', $detail_boarding->id_owner)->first();
				?> -->
				<span><li>Chủ:</li></span>
				<span><li>Số điện thoại: </li></span>
			</div>
		</div>
	</div>
</section>
@endsection