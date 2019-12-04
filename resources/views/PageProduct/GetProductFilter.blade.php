@extends('master')
@section('content')
<!--dinning-->
<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-left" style="margin-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div class="image">
								<a><img alt="image" class="img-responsive" src="./vacayhome/images/category2.png"></a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<h3><a>Beatusish ingl</a></h3>
							<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
							<div class="links"><a href="single-blog.html">Read more</a></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-left" style="margin-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div class="image">
								<a><img alt="image" class="img-responsive" src="./vacayhome/images/category2.png"></a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<h3><a>Beatusish ingl</a></h3>
							<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
							<div class="links"><a href="single-blog.html">Read more</a></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 col-sm-12 col-xs-12 remove-padd-left" style="margin-top: 20px">
					<div class="side-A">
						<div class="product-thumb">
							<div class="image">
								<a><img alt="image" class="img-responsive" src="./vacayhome/images/category2.png"></a>
							</div>
						</div>
					</div>
					<div class="side-B">
						<div class="product-desc-side">
							<h3><a>Beatusish ingl</a></h3>
							<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
							<div class="links"><a href="single-blog.html">Read more</a></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<aside class="col-md-3 col-sm-4 col-xs-12">
				<div class="blog-list">
					<h4>Thể Loại</h4>
					<ul>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Bàn Học Sinh</a></li>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Ghế Sofa</a></li>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Kệ Sách</a></li>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Tủ Quần Áo</a></li>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Tủ Giày</a></li>
						<li><a href="{{route('product-type')}}"><i class="fa fa-caret-right"> </i>Bàn Ăn</a></li>
					</ul>

					<div class="clearfix"> </div>
				</div>
				<div class="blog-list">
					<h4>BỘ LỌC</h4>
					<ul>
						<li><a href="{{route('product-filter')}}"><i class="fa fa-caret-right"> </i>Sản Phẩm Trên 200 Nghìn</a></li>
						<li><a href="{{route('product-filter')}}"><i class="fa fa-caret-right"> </i>Sản Phẩm 100 Nghìn Đến 200 Nghìn</a></li>
						<li><a href="{{route('product-filter')}}"><i class="fa fa-caret-right"> </i>Sản Phẩm Dưới 100 Nghìn</a></li>
						<li><a href="{{route('product-filter')}}"><i class="fa fa-caret-right"> </i>Sản Phẩm Dưới 80 Nghìn</a></li>
					</ul>
				</div>
				<div class="blog-list1">
					<h4>Popular Posts</h4>
					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="./vacayhome/images/Home/img1.jpg" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="./vacayhome/images/Home/img3.jpg" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="./vacayhome/images/Home/img4.jpg" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="blog-list-top">
						<div class="blog-img">
							<a><img class="img-responsive" src="./vacayhome/images/Home/img5.jpg" alt=""></a>
						</div>
						<div class="blog-text">
							<p><a>Lorem ipsum dolor sit amet, consectetuer</a></p>
							<span class="link">
								Sep 14, 2016
							</span>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</aside>
		</div>
	</div>
</section>
<!--end-->


<div style="margin-left: 34%">
	<a class="tv-pagination-link first" href="" style="margin-left: 10px; font-size: 30px">1</a>
	<a class="tv-pagination-link first" href="" style="margin-left: 10px; font-size: 30px">2</a>
	<a class="tv-pagination-link first" href="" style="margin-left: 10px; font-size: 30px">3</a>
</div>
@endsection