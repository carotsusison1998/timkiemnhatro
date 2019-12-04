@extends('PageAdmin.adminmaster')
@section('contents')
<section>
	<h2 class="text-center" style="margin-bottom: 20px;">Danh Sách Tài Khoản</h2>
	<table class="table table-responsive table-inverse">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>Số Điện Thoại</th>
				<th>Email</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($alluser as $value)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$value['first_name']." ". $value['last_name']}}</td>
				<td>{{$value['phone']}}</td>
				<td>{{$value['email']}}</td>
				<td>{{$value['username']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection