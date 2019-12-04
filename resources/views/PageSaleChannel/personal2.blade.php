<section>
	<img src="./vacayhome/images/banner.png" alt="" style="border-radius: 90px" width="150px" height="150px"> <br> <br>
	<div class="clearfix"></div>
	
	<div class="row" style="margin-left: 9px; font-size: 20px">
		<ul>
			<a href="{{route('sales-channel', $customer['id'])}}"><span><b>Xin Chào: {{$customer['last_name']}}</b></span></a> <br> <br>
		</ul>
		<div class="clearfix"></div>

		<ul>
			<a href="{{route('hrm-boardinghouse', $customer['id'])}}"><b>Quản Lí Nhà Trọ</b></a> <br> <br>
		</ul>
		<div class="clearfix"></div>

		<div class="clearfix"></div>

		<ul>
			<a href="{{route('hrm-product', $customer['id'])}}"><b>Quản Lí Sản Phẩm</b></a> <br> <br>
		</ul>
		<div class="clearfix"></div>

	</div>
</section>