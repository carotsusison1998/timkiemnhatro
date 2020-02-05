<script src="./vacayhome/js/jquery.min.js" type="text/javascript"></script>
@extends('master')
@section('content')
<section>
	<div class="clearfix"><br></div>
	<h2 class="text-center">Đăng Kí Tài Khoản</h2>
	<div class="clearfix"><br></div>
	<div class="container">
		<div class="col-md-5">
			<!-- xảy ra lỗi sẽ hiển thị thông báo cho người dùng biết -->
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<script language="javascript" type="text/javascript">
					alert('Đã xảy ra lỗi trong quá trình đăng kí, vui lòng kiểm tra lại');
				</script>
				@foreach($errors->all() as $err)
				{{$err}} <br>
				@endforeach
			</div>
			@endif
			<!-- đăng kí thành công sẽ hiển thị thông báo cho người dùng biết -->
			@if(Session::has('thongbao'))
			<div class="alert alert-success">
				<script language="javascript" type="text/javascript">
					alert('Tài khoản được tạo thành công');
				</script> 
				{{Session::get('thongbao')}}
			</div>
			@endif
			<form method="POST" action="{{route('sign-up')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<fieldset class="form-group">
					<div class="col-md-8" style="margin-left: -13px">
						<label for="exampleInputEmail1">Họ</label>
						<input type="text" class="form-control" name="firstname" id="exampleInputEmail1" placeholder="Họ">
					</div>
					<div class="col-md-4"style="left: 28px">
						<label for="exampleInputEmail1">Tên</label>
						<input type="text" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="Tên">
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Số Điện Thoại</label>
					<input type="text" class="form-control" name="phone" id="mobile" placeholder="số điện thoại của bạn và kiểm tra"> <br>
					<p id="test"></p>
					<!-- <a class="checkmobile">Kiểm tra số điện thoại</a> -->
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="email của bạn">
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Tài Khoản</label>
					<input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="tài khoản bạn muốn đăng kí">
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Mật Khẩu</label>
					<input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="mật khẩu của bạn">
				</fieldset>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary ">Đăng Kí</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<a><img src="./vacayhome/images/category1.png" class="img-responsive" alt="image"></a>
		</div>
	</div>
</section>
@endsection

<script type="text/javascript">
	$(document).ready(function() {
		// $('body').on('click','.checkmobile', function() {
		// 	var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
		// 	var mobile = $('#mobile').val();
		// 	if(mobile !==''){
		// 		if (vnf_regex.test(mobile) == false) 
		// 		{
		// 			alert('Số điện thoại của bạn không đúng định dạng!');

		// 		}else{
		// 			alert('Số điện thoại của bạn hợp lệ!');
		// 		}
		// 	}else{
		// 		alert('Bạn chưa điền số điện thoại!');

		// 	}
		// });

		$('#mobile').keyup(function(){

			var mobile = $(this).val();
			// console.log(mobile);
			$.ajax({
				url: '{{route('checknumber')}}',
				method: 'get',
				data: {mobile: mobile},
				success: function(data){
					// $('#street').html(data);
					$('#test').html(data);
					console.log(data);
				}
			})
		})
	});
</script>

