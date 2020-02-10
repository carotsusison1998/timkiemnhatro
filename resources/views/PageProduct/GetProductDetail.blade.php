@extends('master')
@section('content')
<style>
	.about-right p{
		border-bottom: 1px solid #ff4157;
	}
	.carousel-caption h1{
		color: blue
	}
	#id1{
		border-left: 1px solid #8D8787;
		border-right: 1px solid #8D8787;
		border-bottom: 1px solid #8D8787;
		border-radius: 5px;
		padding-bottom: 10px;
		padding: 10px;
	}
	#content{
		margin-top: 20px;
		line-height: 2.0;
		font-size: 15px;
	}
	.title h3{
		color: #eee;
		border: 1px solid #8D8787;
		padding: 10px;
		background: #333;
		border-radius: 5px
	}
	#id2 span{
		font-size: 18px;
		line-height: 0.5
	}

	#carts{
		border: 1px #eeba8c solid;
		padding: 10px;
		padding-bottom: 10px;
		color:
		darkorange;
		background-color:
		blanchedalmond;
		border-radius: 3px;

	}
	.per{
		background-color: #eaeaec;
		margin-top: 20px;
		border: 1px solid #878181
	}
	.per img{
		width: 100px;
		height: 100px;
		margin-left: -16px;
	}
	.per span{
		font-size: 20px;
	}

	.abc{
		border-right: 1px solid #878181;
		margin-top: 10px;
	}
	.te{
		text-align: center;
		color: #605F5F;
		margin-top: 10px;
	}
	.te p{
		color: #E63C15;
		margin-top: 20px;
	}
	#comment{
		margin-top: 15px;
		border-top: 1px solid black;
	}
	#comment h4{
		font-size: 20px;
	}
</style>
<section class="about-block">
	<div class="container">
		<div class="row">
			@if(Session::has('thongbao'))
			<div class="alert alert-success">
				{{Session::get('thongbao')}}
			</div>
			@endif
			<div class="col-md-8 about-left">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php $dem = count($image_detail); ?>
						@for($i=0; $i < $dem; $i++)
						<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
						@endfor
					</ol>
					<div class="carousel-inner">
						<div class="item active"> <img src="../vacayhome/images/anh11.jpg" style="width:100%; height: 500px" alt="First slide">
							<div class="carousel-caption">
								<h1>vacayHome<br> Sản Phẩm</h1>
							</div>
						</div>
						@foreach($image_detail as $value)
						<div class="item"> <img src=".././resources/UploadImage/ImageProduct/ProductDetail/{{$value['image']}}" style="width:100%; height: 500px" alt="Second slide">
							<div class="carousel-caption">
								<h1>vacayHome<br> Sản Phẩm {{$product_detail['name']}}</h1>
							</div>
						</div>
						@endforeach
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev"> 
						<img src="../vacayhome/images/icons/left-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/left-arrow-hover.png'" onmouseout="this.src = './.vacayhome/images/icons/left-arrow.png'" alt="left">
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<img src="../vacayhome/images/icons/right-arrow.png" onmouseover="this.src = '../vacayhome/images/icons/right-arrow-hover.png'" onmouseout="this.src = '../vacayhome/images/icons/right-arrow.png'" alt="left">
					</a>
				</div>
			</div>
			<div class="col-md-4 about-right">
				<h3>{{$product_detail['name']}}</h3>
				@if($product_detail['sale'] == '0')
				<h4><p style="background-color: #ff4157; margin-top: 8px; border-radius: 30px; padding: 5px">
					Giá: <b>{{number_format($product_detail['price'])}} Vnd
					</p>
				</h4> <br>  
				@else
				<h4><p style=" border-radius: 30px; padding: 5px; text-decoration: line-through;">
					Giá: <b>{{number_format($product_detail['price'])}} Vnd
					</p>
					<p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 5px;">
						Giá Sale: <b>{{number_format($product_detail['sale'])}} Vnd
						</p>
					</h4>
					@endif
					<ul class="list-unstyled list-inline" id="id2">
						<span>Nơi Sản Xuất: {{$product_detail['production']}}</span>
						@if($product_detail['status'] === 1)
						<span>Trạng Thái: Đang Bán</span>
						@else
						<span>Trạng Thái: Hết Hàng</span>
						@endif
						<span>Số Lượng: {{$product_detail['quantity']}}  Sản Phẩm</span>
						<?php 
						$date = date_create($product_detail['created_at']);
						$d = date_format($date, 'd-m-Y');
						$c = date_format($date, 'H:i');
						$typeproduct = DB::table('type_product')->where('id', $product_detail['id_typeproduct'])->first();
						$shop = DB::table('sales_channel')->where('id_customer', $product_detail['id_customer'])->first();
						?>
						<span>Loại Sản Phẩm: {{$typeproduct->name}}</span>
						<span>Tên Shop: <a href="{{route('all-motel', $product_detail->id_customer)}}">{{$shop->name_channelsales}}</a></span> <br> <br>
						<a href="{{route('shoppingcart', [$product_detail['id'], $product_detail['name']])}}" id="carts"><i class="fa fa-cart-plus fa-2x"></i>Thêm Vào Giỏ Hàng</a>
						<br> <br>
						<p>Thời Gian Đăng: {{$c}} Ngày {{$d}}</p>
						
					</ul>
				</div>
			</div>
			<div class="container">
				<div class="row" id="id1">
					<div class="title">
						<h3><b>Thông Tin Sản Phẩm</b></h3>
					</div>
					<div id="content">
						{{$product_detail['description']}}
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<?php 
					$image = DB::table('customer')->where('id', $product_detail['id_customer'])->first();
					$product = DB::table('product')->where('id_customer', $product_detail['id_customer'])->get();
					$datediff = abs(strtotime(date("Y-m-d")) - strtotime($image->created_at));
					$date = floor(($datediff / (60*60*24))/30);
					?>
					<div class="per">
						<div class="col-sm-4 abc">
							<img src=".././resources/UploadImage/Image/{{$image->image}}">
							<span>{{$shop->name_channelsales}}</span>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-4 te">Đánh Giá <p>44</p></div>
							<div class="col-sm-4 te">tham gia <p>{{$date}} tháng trước</p></div>
							<div class="col-sm-4 te">Sản Phẩm <p>{{count($product)}}</p></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"><br></div>
			<div class="container" id="comment">
				<h4>Đánh Giá ({{count($comment)}})</h4>
				<div class="col-md-12 col-sm-8 col-xs-12">
					@foreach($comment as $value)
					<span>
						<?php 
							$cus = DB::table('customer')->where('id', $value['id_customer'])->first();
							$rep = DB::table('rep_comment_product')->where('id_comment', $value->id)->paginate(3);
						?>
						<img src="../../public/resources/UploadImage/Image/{{$cus->image}}" width="60px" height="60px" style="border-radius: 45px">
						<span>{{$cus->first_name." ".$cus->last_name}}</span> 
						<div class="btn-group" data-toggle="buttons">
							@if($value->star == 1)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="1" name="star" disabled="">1 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 2)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="2" name="star" disabled="">2 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 3)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="3" name="star" disabled="">3 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 4)
							<label class="btn btn-primary">
								<input type="checkbox" autocomplete="off" value="4" name="star" disabled="">4 <i class="fa fa-star"></i>
							</label>
							@elseif($value->star == 5)
							<label class="btn btn-primary">
								<input type="checkbox" checked autocomplete="off" value="5" name="star" disabled="">5 <i class="fa fa-star"></i>
							</label>
							@endif							
						</div>
						<div> <br>
							<span>{{$value->content}}</span> <br>
							@foreach($rep as $values)
							<div style="margin-left: 5%; border: 1px solid black">
								<img class="clearfix" style="width: 60px; height: 60px; background-color: black; border-radius: 45px; ">
								<p style="margin-left: 7%">{{$values->content}}</p> <br>
							</div>
							@endforeach
							
							<form style="width: 100%;" method="post" action="{{route('repcomment-product', $value->id)}}" enctype="multipart/form-data" style="margin-top: 5%; z-index: 100">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="id_customer" value="{{$customer['id']}}">
								<div class="col">
									<textarea id="" col="30" style="width:100%;" rows="5" name="content" placeholder="viết trả lời ở đây........."></textarea>
								</div>
								@if(Auth::check())
								<button class="btn btn-success btnrep">Gửi</button>
								@else
								<button class="btn btn-success" disabled="" title="đăng nhập để trả lời bình luận">Gửi</button>
								@endif
							</form>
						</div>
					</span> <br> <br> <br>
					@endforeach
				</div>	 

				<div class="col-md-6 col-sm-8 col-xs-12">
					<div class="clearfix"></div>
					<div class="single-bottom comment-form">
						<h4>Bình Luận</h4>
						<form action="{{route('comment-product', $product_detail['id'])}}" method="post">
							<div class="container">
								<div class="row">
									<div class="btn" data-toggle="buttons">
										<label class="btn btn-primary">
											<input type="checkbox" value="1" name="star">1 <i class="fa fa-star"></i>
										</label>
										<label class="btn btn-primary">
											<input type="checkbox" value="2" name="star">2 <i class="fa fa-star"></i>
										</label>
										<label class="btn btn-primary">
											<input type="checkbox" value="3" name="star">3 <i class="fa fa-star"></i>
										</label>
										<label class="btn btn-primary">
											<input type="checkbox" value="4" name="star">4 <i class="fa fa-star"></i>
										</label>
										<label class="btn btn-primary">
											<input type="checkbox" value="5" name="star">5 <i class="fa fa-star"></i>
										</label>
									</div>
								</div>
							</div>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="id_customer" value="{{$customer['id']}}">
							<textarea class="form-control" placeholder="viết bình luận ở đây...." required="" name="content"></textarea>
							@if(Auth::check())
							<input type="submit" class="submit-btn" value="Gửi Bình Luận">
							@else
							<input type="submit" class="submit-btn" value="Gửi Bình Luận" disabled="" title="Đăng nhập trước khi bình luận">
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection