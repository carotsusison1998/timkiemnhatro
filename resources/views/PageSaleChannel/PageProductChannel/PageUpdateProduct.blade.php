@extends('PageSaleChannel.master')
@section('content')
<style>
	.col-sm-4 img{
		margin-left: 45px;
	}
	#te{
		width: 100%;
	}
	.image img{
		margin-top: 5px;
		margin-left: -10px;
	}
	.image i{
		position: relative;
		top: -67px;
		left: -12px;
	}
	.center{
		margin-left: 47%;
		width: 100px;
	}
</style>
<section>
	<h3 class="text-center">Cập nhật thông tin sản phẩm: {{$product['name']}}</h3>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">{{Session::get('thongbao')}}</div>
	@endif
	<a href="{{route('hrm-product', $customer['id'])}}"  style="color: white"><button class="btn btn-success"><b>Trở về</b></button></a>
	<form action="{{route('product-update', $product['id'])}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}"> <br>
		<input type="hidden" name="id_customer" value="{{$customer['id']}}"> <br>
		<fieldset class="form-group">
			<div class="col-sm-12">
				<label for="exampleInputPassword1">Tên Sản Phẩm</label>
				<input type="text" class="form-control" name="name" placeholder="tên sản phẩm" value="{{$product['name']}}">
			</div>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Giá Sản Phẩm</label>
				<input type="text" class="form-control" name="price" placeholder="giá sản phẩm" value="{{$product['price']}}">
			</div>
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Giá Khuyến Mãi</label>
				<input type="text" class="form-control" name="sale" placeholder="giá khuyến mãi" value="{{$product['sale']}}">
			</div>
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Số Lượng</label>
				<input type="number" class="form-control" name="quantity" placeholder="số lượng" value="{{$product['quantity']}}">
			</div>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Ảnh</label>
				<input type="file" class="form-control" name="image" value="">
			</div>
			<div class="col-sm-4">
				<img src="../../public/resources/UploadImage/ImageProduct/ProductAvatar/{{$product['image']}}" alt="" width="150px" height="150px">
			</div>
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Nơi Sản Xuất</label>
				<input type="text" class="form-control" name="production" placeholder="nơi sản xuất" value="{{$product['production']}}">
			</div>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-3">
				<label for="exampleInputPassword1">Trạng Thái Bán Hàng</label><br>
				<select name="status" id="" class="form-control">
				@if($product['status'] == '1')
					<option value="0">Ngưng Bán</option>
					<option value="1" selected="">Đang Bán</option>
				@else
					<option value="0" selected="">Ngưng Bán</option>
					<option value="1">Đang Bán</option>
				@endif
				</select>
			</div>
			<div class="col-sm-9">
				<label for="exampleInputPassword1">Mô Tả</label><br>
				<textarea id="te"  rows="10" name="description">{{$product['description']}}</textarea>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-4">
				<label for="exampleInputPassword1">Loại Sản Phẩm</label><br>
				<?php 
					$type = DB::table('type_product')->where('id', $product['id_typeproduct'])->first();
					$alltype = DB::table('type_product')->get();
				?>
				<select name="id_typeproduct" id="" class="form-control">
					<option value="{{$type->id}}" selected="">{{$type->name}}</option>
					@foreach($alltype as $values)
					<option value="{{$values->id}}">{{$values->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-8 image">
				<?php 
					$image = DB::table('image_product')->where('id_product', $product->id)->get();
				?>
				@foreach($image as $img)
				<img src="../../public/resources/UploadImage/ImageProduct/ProductDetail/{{$img->image}}" alt="" width="150px" height="150px"><a href="{{route('delete-image', $img->id)}}"><i class="fa fa-times" title="xóa ảnh"></i></a>
				@endforeach
				<br> <br>
				<input type="file" class="form-control" name="picture[]" multiple="">
			</div>
		</fieldset>
		<button type="submit" class="btn btn-primary center">Cập nhật</button>
	</form>
</section>
@endsection