@extends('PageLayoutForDetail.master')
@section('content')
<section>
	<div class="container">
		<h2 class="text-center" style="margin-bottom: 20px;">ĐỔI THÔNG TIN</h2>
		<form action="{{route('change-informations')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="id" value="{{$user['id']}}">
			<fieldset class="form-group">
				<div class="col-sm-7" style="padding-left: 0">
					<label for="exampleInputEmail1">Họ và chữ lót</label>
					<input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="họ và chữ lót của bạn" value="{{$user['first_name']}}" >
				</div>
				<div class="col-sm-5" style="padding-right: 0">
					<label for="exampleInputEmail1">Tên</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên của bạn" value="{{$user['last_name']}}" name="last_name">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Mật khẩu mới</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="mật khẩu mới" name="password">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Số điện thoại</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="số điện thoại" value="{{$user['phone']}}" name="phone">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Tuổi</label>
				<input type="number" class="form-control" id="exampleInputPassword1" placeholder="tuổi" value="{{$user['age']}}" name="age">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleTextarea">Địa chỉ</label>
				<textarea class="form-control" id="exampleTextarea" rows="3" name="address">{{$user['address']}}</textarea>
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputFile">File ảnh</label>
				<input type="file" class="form-control-file" id="exampleInputFile" name="image">
			</fieldset>
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>
</section>
@endsection