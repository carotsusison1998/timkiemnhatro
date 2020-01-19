@extends('PageSaleChannel.master')
@section('content')
<style>
	#insert{
		color: white; float: right; padding-bottom: 10px;
	}
	#search{
		border-radius: 20px;
	}
	table{
		margin-top: 20px;
	}
</style>
<section>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		<script language="javascript" type="text/javascript">
			alert('Nhà trọ đã được xóa thành công');
		</script> 
		{{Session::get('thongbao')}}
	</div>
	@endif
	<h2 class="text-center">Danh Sách Nhà Trọ</h2>
	<div class="clearfix"><br></div>
	<div class="clearfix"></div>
	<a href="{{route('insert-boardinghouse')}}" id="insert"><b><button class="btn btn-success" style="width: 150px">Thêm Nhà Trọ</button></b></a>
	<input type="text" class="form-control" placeholder="tìm kiếm" id="search">
	<table class="table table-responsive table-inverse">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên Nhà Trọ</th>
				<th>Giá</th>
				<th>Đường</th>
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
				<td>{{$value['price']}} Vnd</td>
				<?php $data = DB::table('street')->where('id', $value['id_street'])->first(); ?>
				<td>{{$data->name}}</td>
				<?php $data = DB::table('Type_BoardingHouse')->where('id', $value['id_type_boardinghouse'])->first(); ?>
				<td>{{$data->name}}</td>
				<td>
					@if($value['status'] == 4 || $value['status'] == 3 || $value['status'] == 2)
					<a href="{{route('update-boardinghousee', $value['id'])}}"><button class="btn btn-info" disabled="" style="color: black">Sửa </button></a>
					@else
					<a href="{{route('update-boardinghousee', $value['id'])}}"><button class="btn btn-info" style="color: black">Sửa</button></a>
					@endif
					<a href="{{route('delete-boardinghouse', $value['id'])}}"><button class="btn btn-warning">Xóa</button></a>
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

<script>
	$(document).ready(function(){
		$("#search").keyup(function(){
			var key = $(this).val();
			$.ajax({
				type: 'get',
				url: '{{route('search')}}',
				data: {'search': key},
				success: function(data){
					// console.log(data);
					$('tbody').html(data);
				}
			})
		})
	})
</script>
@endsection