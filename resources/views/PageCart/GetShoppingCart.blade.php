<style>
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
			<table class="table table-bordered table-customize table-responsive">
				<thead>
					<tr><td colspan="6"><h2><b>Thông Tin Giỏ Hàng</b></h2></td></tr>
					<tr>
						<th>STT</th>
						<th>Hình Ảnh</th>
						<th>Tên Sản Phẩm</th>
						<th>Đơn Giá</th>
						<th>Số Lượng</th>
						<th>Thành Tiền</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td><img src="./vacayhome/images/banner.png" height="40px" width="40px" alt=""></td>
						<td>Kệ Giày</td>
						<td>50.000 Vnd</td>
						<td>1</td>
						<td>50.000 Vnd</td>
					</tr>
					<tr>
						<td>1</td>
						<td><img src="./vacayhome/images/banner.png" height="40px" width="40px" alt=""></td>
						<td>Tủ Quần Áo (Vải)</td>
						<td>99.000 Vnd</td>
						<td>1</td>
						<td>99.000 Vnd</td>
					</tr>
					<td colspan="6"><b>Tổng Tiền:  149.000 Vnd</b></td>
				</tbody>
			</table>
			<div class="clearfix"><br> <br> <br></div>
			<div class="col-md-6">
				<div class="clearfix"></div>
				<div class="single-bottom comment-form">
					<select name="" id="" style="height: 40px; background-color: #7FFFD4">
						<option value="">Giao Hàng Nhận Tiền</option>
						<option value="">Chuyển Khoản</option>
						<option value="">Ví Điện Tử</option>
					</select>
					<form action="#" method="post">
						<textarea class="form-control" name="Message" placeholder="Ghi chú cho người vận chuyển...." required=""></textarea>
						<input type="submit" class="submit-btn" value="Thanh Toán">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection