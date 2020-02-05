@extends('PageSaleChannel.master')
@section('content')
<section>
	<h2 class="text-center">Danh Sách Sản Phẩm</h2>
	<div class="clearfix"><br></div>
	<button class="btn btn-success">
		<a href="{{route('insert-product')}}"  style="color: white"><b>Thêm Sản Phẩm</b></a>
	</button>
	<table class="table table-responsive table-inverse">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên Sản Phẩm</th>
				<th>Giá</th>
				<th>Giá Khuyến Mãi</th>
				<th>Loại Sản Phẩm</th>
				<th>Thao Tác</th>

			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			@foreach($product as $value)
			<tr>
				<td>{{$i++}}</td>
				<td><a href="{{route('detail-product', $value->id)}}">{{$value['name']}}</a></td>
				<td>{{number_format($value['price'])}} Vnd</td>
				@if($value['sale'] == 0)
				<td>chưa khuyên mãi</td>
				@else
				<td>{{number_format($value['sale'])}} Vnd</td>
				@endif
				<?php $type = DB::table('Type_Product')->where('id', $value['id_typeproduct'])->first(); ?>
				<td>{{$type->name}}</td>
				<td>
					<a href="{{route('product-update', $value->id)}}">Sửa</a>
					<a href="" style="margin-left: 10px">Xóa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection