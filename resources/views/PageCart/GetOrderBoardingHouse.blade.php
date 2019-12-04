	@extends('PageLayoutForDetail.master')
	@section('content')
	<section class="about-block">
		<div class="container">
			<div class="row">
				<h2 class="text-center">Lịch Sử Giao Dịch Của Bạn: ({{count($book)}})</h2> <br>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Nhà Trọ</th>
							<th>Giá</th>
							<th>Địa Chỉ</th>
							<th>Số Điện Thoại</th>
							<th>Tên Chủ Trọ</th>
							<th>Ngày Đặt</th>
							<th>Thao Tác</th>
							<th>Tùy Chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($book as $value)
						<?php 
						$book_detail = DB::table('Booking_Detail')->where('id_booking', $value['id'])->get();
						?>
						@foreach($book_detail as $values)
						<?php 
						$b = DB::table('Boarding_House')->where('id', $values->id_boardinghouse)->first();
						?>
						<tr>
							<td>{{$i++}}</td>
							<td><a href="{{url('motel-detail', $b->id)}}">{{$b->name}}</a></td>
							<td>{{number_format($values->price)}} Vnd</td>
							<td>{{$b->address}}</td>
							<?php $phone = DB::table('Customer')->where('id', $b->id_owner)->first(); ?>
							<td>{{$phone->phone}}</td>
							<td>{{$phone->first_name}} {{$phone->last_name}}</td>
							<?php 
							$date = date_create($value['created_at']);
							$d = date_format($date, 'd-m-Y');
							$c = date_format($date, 'H:i');
							?>
							<td>{{$c}} {{$d}}</td>
							<td>
								@if($b->status == 4)
								<p>bị hủy</p>	
								@elseif($b->status == 2)
								<p>chờ xác nhận</p>
								@elseif($b->status == 3)
								<p>thành công</p>
								@endif
							</td>
							<td>
								@if($b->status == 2)
								<form action="{{route('confirm-boardinghouse3')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id_boar" value="{{$b->id}}">

									<button class="btn btn-success">Hủy</button>
								</form>
								@elseif($b->status == 3)
								<form action="{{route('confirm-boardinghouse3')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id_boar" value="{{$b->id}}">

									<button class="btn btn-success">Hủy</button>
								</form>
								@elseif($b->status == 4)
								<form action="{{route('confirm-boardinghouse4')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id_boar" value="{{$b->id}}">

									<button class="btn btn-success">Đặt lại</button>
								</form>
								@endif
							</td>
						</tr>
						@endforeach
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
	@endsection