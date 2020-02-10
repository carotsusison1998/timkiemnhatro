<style>
	#toltel{
		float: right;
	}
	@media (min-width: 320px) and (max-width: 767px) {
		.table-responsive,
		.table-responsive thead,
		.table-responsive tbody,
		.table-responsive th,
		.table-responsive td,
		.table-responsive tr {
			display: block;
		}
		.table-responsive > thead > tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		.table-responsive > tbody > tr {
			border-top: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
		}
		.table-responsive > tbody > tr:first-child {
			border-radius: 3px 3px 0 0;
			border-top: none;
		}
		.table-responsive > tbody > tr:last-child {
			border-radius: 0 0 3px 3px;
			border-bottom: none;
		}
		.table-responsive > tbody > tr td {
			border: none;
			border-bottom: 1px solid #ccc;
			position: relative;
			padding-left: 30% !important;
			width: 100%;
			overflow: hidden;
		}
		.table-responsive > tbody > tr td:before {
			content: attr(data-title);
			position: absolute;
			top: 15px;
			left: 14px;
			width: 30%;
			padding-right: 10px;
			white-space: nowrap;
			font-size: 14px;
		}
		.table-responsive > tbody > tr td:first-child {
			text-align: left;
		}
		.table-responsive.table-order > tbody > tr:nth-child(-n + 3) > td:first-child {
			padding: 25px 0 25px 30% !important;
			background-position: left 32% center;
		}
		.table-responsive.table-order > tbody > tr:nth-child(-n + 3) > td:first-child span {
			left: 32%;
		}
	}
</style>
@extends('master')
@section('content')
<section class="about-block">
	<div class="container">
		<div class="row">
			@if(Session::has('thongbao'))
			<div class="alert alert-success">
				{{Session::get('thongbao')}}
			</div>
			@endif
			<table class="table table-bordered table-customize table-responsive">
				<thead>
					<tr><td colspan="7"><h2><b>Thông Tin Giỏ Hàng</b></h2></td></tr>
					<tr>
						<th>STT</th>
						<th>Hình Ảnh</th>
						<th>Tên Sản Phẩm</th>
						<th>Đơn Giá</th>
						<th>Số Lượng</th>
						<th>Thành Tiền</th>
						<th>Thao Tác</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<form method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@foreach($cart as $value)
						<tr>
							<td>{{$i++}}</td>
							<td><img src="../public/resources/UploadImage/ImageProduct/ProductAvatar/{{$value['attributes']['image']}}" height="40px" width="40px" alt=""></td>
							<td>{{$value['name']}} == {{$value['id']}}</td>
							<td>{{number_format($value['price'],0,",",".")}} Vnd</td>
							<td><input type="number" value="{{$value['quantity']}}" class="form-control qty"></td>
							<td>{{number_format($value['price']*$value['quantity'],0,",",".")}} Vnd</td>
							<td>
								<div class="update" id="{{$value['id']}}"><img src="../public/vacayhome/images/update.png" width="30px" height="30px" alt="">Sửa</div>
								<div>
									<a href="{{route('remove-cart', $value['id'])}}">
										<img src="../public/vacayhome/images/delete.jpg" width="30px" height="30px" alt="">
									Xóa</a>
								</div>
							</td>
						</tr>
						@endforeach
					</form>
					<tr>
						<td colspan="5">Số lượng sản phẩm: {{count($cart)}}</td>
						<td colspan="2" id="toltel"><b>Tổng Tiền:  {{number_format($sum,0,",",".")}} Vnd</b></td>
						<td colspan="1"><a href="{{route('clear-cart')}}"><button class="btn btn-default center-block">Xóa giỏ hàng</button></a></td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix"><br> <br> <br></div>
			<div class="col-md-6">
				<div class="clearfix"></div>
				<div class="single-bottom comment-form">
					@if(Auth::check())
					<form action="{{route('save-cart', $customer['id'])}}" method="post">
						{!! csrf_field() !!}
						<select name="payment" id="" style="height: 40px; background-color: #7FFFD4">
							<option value="Giao Hàng Nhận Tiền">Giao Hàng Nhận Tiền</option>
							<option value="Chuyển Khoản">Chuyển Khoản</option>
							<option value="Ví Điện Tử">Ví Điện Tử</option>
						</select>
						<textarea class="form-control" name="note" placeholder="Ghi chú cho người vận chuyển...."></textarea>
						<input type="submit" class="btn btn-success" value="Đặt Hàng">
					</form>
					@else
					<form action="" method="post">
						{!! csrf_field() !!}
						<select name="" id="" style="height: 40px; background-color: #7FFFD4">
							<option value="">Giao Hàng Nhận Tiền</option>
							<option value="">Chuyển Khoản</option>
							<option value="">Ví Điện Tử</option>
						</select>
						<textarea class="form-control" name="Message" placeholder="Đăng nhập trước khi đặt hàng...." disabled=""></textarea>
						<input type="submit" class="btn btn-success" disabled="" title="Đăng nhập trước khi đặt hàng" value="Đặt Hàng">
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$(".update").click(function(){
			var id = $(this).attr('id');
			var qty = $(this).parent().parent().find(".qty").val();
			var token = $("input[name='_token']").val();
			// console.log(id+"-"+qty+"-"+token);

			$.ajax({
				url: 'update-cart/'+id+'/'+qty,
				type: 'GET',
				cache: false,
				data: {"_token":token, "id":id, "qty":qty},
				success: function(data){
					// window.location = "shopping-cart"
					// console.log(data);
					if(data == 'not')
					{
						alert("không đủ số lượng để bạn cập nhật");
						window.location = "shopping-cart";

					}
					else
					{
						alert("cập nhật thành công");
						window.location = "shopping-cart";
					}
				}
			});
		})
	})
</script>