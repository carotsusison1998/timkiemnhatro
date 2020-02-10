@extends('PageLayoutForDetail.master')
@section('content')
<style>
	th{
		text-align: center;
	}
	td{
		text-align: center;
	}
	.conte .row {
		position: absolute;
		left: 20px
	}
</style>
<section class="about-block">
	<div class="container">
		<div class="row">
			<h2 class="text-center">Đơn hàng Của Bạn ({{count($order)}})</h2> <br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Hình thức thanh toán</th>
						<th>Tổng tiền</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i=1;
					?>
					@foreach($order as $value)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$value['payment']}}</td>
						<td>{{number_format($value['total'])}} VND</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Chi tiết</button>
							<!-- Modal -->
							<?php  
								$detail = DB::table('detail_order_product')->where('id_order', $value['id'])->get();
								// echo "<pre>";
								// print_r($detail->toArray());
								// echo "</pre>";
							?>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Theo Dõi Chi Tiết Đơn Hàng</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      @foreach($detail as $value)
							      <div class="modal-body conte">
							       	<div class="row">
							       		<p>{{$value->price}}</p>
							       	</div>
							      </div>
							      @endforeach
							    </div>
							  </div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>


@endsection