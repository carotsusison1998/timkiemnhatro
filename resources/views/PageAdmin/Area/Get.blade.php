@extends('PageAdmin.adminmaster')
@section('contents')
<section>
	<h2 class="text-center" style="margin-bottom: 20px;">Danh Sách Khu Vực Nhà Trọ</h2>
	@if(Session::has('thongbao'))
	<div class="alert alert-success">
		{{Session::get('thongbao')}}
	</div>
	@endif
	<table class="table table-responsive table-inverse">
		<thead>
			<tr>
				<th>STT</th>
				<th>ID</th>
				<th>Tên Thể loại</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($area as $value)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$value['id']}}</td>
				<td>{{$value['name']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Thêm Mới
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="{{route('area')}}" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Trang Thêm</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="text" class="form-control" placeholder="tên khu vực" name="area">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
						<input type="submit" class="btn btn-danger" value="Thêm">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection