@extends('PageSaleChannel.master2')
@section('content')
<section>
	<h2 class="text-center">Trang Thêm Sản Phẩm</h2>
	<div class="clearfix"><br></div>
	<a href="{{route('hrm-product')}}"><button class="btn btn-success"><b>Trở về</b></button></a>
	<div class="clearfix"><br></div>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		{{Session::get('thongbao')}}
	</div>
	@endif
	<form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" value="{{$customer['id']}}" name="id_customer">
		<fieldset class="form-group">
			<label for="exampleSelect1">Loại Sản Phẩm</label>
			<select class="form-control" id="eexampleSelect11" name="type_product">
				@foreach($type_product as $value)
				<option value="{{$value['id']}}">{{$value['name']}}</option>
				@endforeach
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputEmail1">Tên Sản Phẩm</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên sản phẩm" name="name_product">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Giá Sản Phẩm</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="giá sản phẩm" name="price_product">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Giá Khuyến Mãi</label>
			<input type="text" class="form-control" id="exampleInputPassword1"  value="0" placeholder="giá khuyến mãi" name="sales_product">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Số Lượng Sản Phẩm</label>
			<input type="number" class="form-control" id="exampleInputPassword1" placeholder="số lượng nhập vào" name="quantity">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Nơi Sản Xuất</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="xuất xứ" name="production">
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleInputPassword1">Địa Chỉ</label>
			<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="địa chỉ" name="address"></textarea>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleSelect1">Trạng Thái</label>
			<select class="form-control" id="eexampleSelect11" name="status">
				<option value="1">Còn hàng</option>
				<option value="0">Hết hàng</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exampleTextarea">Mô Tả Về Sản Phẩm</label>
			<textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
		</fieldset>
		<fieldset class="form-group">
			<div class="col-sm-5" style="border-right: 1px solid black">
				<label for="exampleInputFile">Ảnh Chi Tiết Của Sản Phẩm</label>
				<div class="form-group" id="insert"><label>Tải Ảnh Lên</label><input type="file" name="picture[]"></div>
				<button type="button" class=" btn btn-primary" id="addImage">
					Thêm Ảnh
				</button>
			</div>
			<div class="col-sm-5">
				<label for="exampleInputFile">Ảnh Đại Diện Của Sản Phẩm</label>
				<input type="file" class="form-control-file" id="exampleInputFile" name="image">
			</div>
		</fieldset>
		<button type="submit" class="btn btn-primary">Thêm Sản Phẩm Mới</button>
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

