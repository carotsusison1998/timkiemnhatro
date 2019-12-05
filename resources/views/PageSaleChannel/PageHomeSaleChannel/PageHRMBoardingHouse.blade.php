@extends('PageSaleChannel.master')
@section('content')
<section>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		<script language="javascript" type="text/javascript">
			alert('Nhà trọ đã được xóa thành công');
		</script> 
		{{Session::get('thongbao')}}
	</div>
	@endif
	<h2 class="text-center">Danh Sách Sản Phẩm</h2>
	<div class="clearfix"><br></div>
	<div class="clearfix"></div>
	<a href="{{route('insert-boardinghouse')}}"style="color: white"><b><button class="btn btn-success">Thêm Nhà Trọ</button></b></a>
	<table class="table table-responsive table-inverse">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên Nhà Trọ</th>
				<th>Giá</th>
				<th>Khu Vực</th>
				<th>Loại Nhà Trọ</th>
				<th>Thao Tác</th>
				<th>Tình Trạng</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			@foreach($boardinghouse as $value)
			<tr>
				<td>{{$i++}}</td>
				<td><a href="{{route('detail-boardinghouse', $value['id'])}}">{{$value['name']}}</a></td>
				<td>{{number_format($value['price'])}} Vnd</td>
				<?php $data = DB::table('Area')->where('id', $value['id_area'])->first(); ?>
				<td>{{$data->name}}</td>
				<?php $data = DB::table('Type_BoardingHouse')->where('id', $value['id_type_boardinghouse'])->first(); ?>
				<td>{{$data->name}}</td>
				<td>
					@if($value['status'] == 4 || $value['status'] == 3 || $value['status'] == 2)
					<a><button class="btn btn-info" disabled="" style="color: black">Sửa </button></a>
					@else
					<a href="{{route('update-boardinghousee', $value['id'])}}"><button class="btn btn-info" style="color: black">Sửa</button></a>
					@endif
					<a href="{{route('delete-boardinghouse', $value['id'])}}"><button class="btn btn-group">Xóa</button></a>
				</td>
				@if($value['status'] == 0)
				<td>Hết phòng</td>
				@elseif($value['status'] == 1)
				<td>Trống</td>
				@elseif($value['status'] == 2)
				<td>Đang chờ xác nhận</td>
				@elseif($value['status'] == 3)
				<td>Đặt thành công</td>
				@elseif($value['status'] == 4)
				<td>Đã bị hủy</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection