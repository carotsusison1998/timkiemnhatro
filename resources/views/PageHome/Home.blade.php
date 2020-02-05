@extends('master')
@section('content')
<div class="container" id="notice">
    <div class="row">
        @foreach($notifycations as $value)
        <div class="col-sm-6 col-md-6">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×</button>
                <?php 
                $boardinghouses = DB::table('boarding_house')->where('id', $value['id_boardinghouse'])->first();
                ?>
                <span class="glyphicon glyphicon-ok"></span> Nhà trọ: <strong>{{$boardinghouses->name}}</strong>
                <hr>
                <p>{{$value['messages']}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="swiper-container">
    <div class="swiper-wrapper">
      @foreach($top as $value)
      <?php 
        $boarding = DB::table('boarding_house')->where('id', $value['id_boardinghouse'])->first();
        $shop = DB::table('sales_channel')->where('id_customer', $boarding->id_owner)->first();
        // echo "<pre>";
        // print_r($shop);
        // echo "</pre>";
        $owner = DB::table('customer')->where('id', $boarding->id_owner)->first();
      ?>
      <div class="swiper-slide">
        <div class="card">
            <div class="sliderText" id="toop">
                <p><b>Kênh: {{$shop->name_channelsales}}</b></p> <br> <br>
            </div>
            <div class="content">
                <p>Chủ nhà trọ: {{$owner->first_name}} {{$owner->last_name}}</p>
                <p>Số điện thoại: {{$owner->phone}}</p>
                
                <p>Địa chỉ: {{$owner->address}}</p>
                <a href="{{route('all-motel', $owner->id)}}">Xem thêm</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Add Pagination -->
</div>

<!-- Swiper JS -->

<!--gallery block--->
<section class="gallery-block gallery-front">
    <div class="container">
        <h2>CÁC DỊCH VỤ CHÍNH CỦA WEBSITE VACAYHOME</h2>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3>Nhà Trọ</h3>

                <div class="gallery-image">
                    <img class="img-responsive" src="./vacayhome/images/anh1.jpg">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="./vacayhome/images/room1.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a href="http://localhost:8080/Laravel/timkiemphongtro/public/motel-all">Nhà Trọ</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3>Khách sạn </h3>

                <div class="gallery-image">
                    <img class="img-responsive" src="./vacayhome/images/anh2.jpg">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="./vacayhome/images/room2.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a href="http://localhost:8080/Laravel/timkiemphongtro/public/motel-type/4">Khách Sạn</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3>Đồ nội thất</h3>

                <div class="gallery-image">

                    <img class="img-responsive" src="./vacayhome/images/anh3.jpg">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="./vacayhome/images/room3.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>Nội Thất</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3>Đặt Vé Xe</h3>

                <div class="gallery-image">

                    <img class="img-responsive" src="./vacayhome/images/anh4.jpg">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="./vacayhome/images/room4.png" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>Đặt Vé Xe</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--offer block-->
<section class="vacation-offer-block">
    <div class="vacation-offer-bgbanner">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="vacation-offer-details">
                        <h1>Your vacation Awaits</h1>
                        <h4>Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit.</h4>
                        <button type="button" class="btn btn-default">Choose a package</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End-->

<!----resort-overview--->
<section class="resort-overview-block">
    <div class="container">
        <h3>Danh Sách Nhà Trọ</h3>
        <div class="row">
            @foreach($boardinghouse as $value)
            <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right" style="padding-top: 20px">
                <div class="side-A">
                    <div class="product-thumb">
                        <div  class="img-responsive" style="">
                            <a href="{{url('motel-detail', $value['id'])}}">
                                <img src="./resources/UploadImage/ImageBoardingHouse/BoardingAvatar/{{$value['image']}}"  alt="image" class="img-rounded" width="300px" height="300px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="side-B">
                    <div class="product-desc-side">
                        <h3><a href="{{url('motel-detail', $value['id'])}}">Nhà Trọ: {{$value['name']}}</a></h3> <br>
                        <h4><p style="background-color: #ff4157; border-radius: 30px; padding: 5px; margin-top: 5px;">
                            Giá Phòng: <b>{{$value['price']}} Vnd
                            </p>
                        </h4> <br>  
                        <p><li>Diện Tích: {{$value['acreage']}}</li></p>
                        <?php 
                        $street = DB::table('street')->where('id', $value['id_street'])->first();
                        $wards = DB::table('wards')->where('id', $street->id_wards)->first();
                        $district = DB::table('district')->where('id', $wards->id_district)->first();
                        $area = DB::table('area')->where('id', $district->id_area)->first();
                            // echo $area->name;
                        ?>
                        <p><b><li>Địa Chỉ: {{$value['number'].', '.$street->name.', '.$wards->name.', '.$district->name.', '.$area->name}}</li></b></p>
                        <p><b><li>
                            <?php 
                            $date = date_create($value['created_at']);
                            $d = date_format($date, 'd-m-Y');
                            $c = date_format($date, 'H:i');
                            ?>
                            Thời Gian Đăng: <br> Lúc {{$c}} Ngày {{$d}}
                        </li></b></p> <br>
                        <div class="links">
                            <a href="{{url('motel-detail', $value['id'])}}" style="border-radius: 30px">Chi Tiết</a>
                            @if($value['status'] != 1)
                            <button class="btn btn-success" disabled=""  style="border-radius: 30px; background-color: #2FF95A">
                                <b title="phòng đã được đặt bởi người khác">Hết Phòng</b>
                            </button>
                            @elseif($value['status'] == 1)
                            @if(Auth::check())
                            <a href="{{route('order-boardinghouse', $value['id'])}}" style="border-radius: 30px; background-color: #2FF95A">Đặt Phòng</a>
                            @else
                            <a href="{{route('order-boardinghouse', $value['id'])}}" title="Đăng nhập trước khi đặt phòng" style="border-radius: 30px; background-color: #2FF95A">Đặt Phòng</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            @endforeach
        </div>
    </div>
</section>
<!-- end -->

<!-- end -->
<div class="clear"><br><br><br></div>
<!-- paginate -->
<div class="container">
    <div class="text-center" style="height: 10px">{{$boardinghouse->links()}}</div>
</div>
<!-- end -->

<!-----blog slider----->
<!--blog trainer block-->
<section class="blog-block-slider">
    <div class="blog-block-slider-fix-image">
        <div id="myCarousel2" class="carousel slide" data-ride="carousel">
            <div class="container">
                <!-- Wrapper for slides -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel2" data-slide-to="1"></li>
                    <li data-target="#myCarousel2" data-slide-to="2"></li>
                    <li data-target="#myCarousel2" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="blog-box">
                            <h3><a>Beatusish ingl</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="links"><a href="single-blog.html">Read more</a></div>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="./vacayhome/images/client1.png" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Walter Hucko</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-box">
                            <h3><a>Beatusish ingl</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="links"><a href="single-blog.html">Read more</a></div>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="./vacayhome/images/client2.png" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Jules Boutin</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-box">
                            <h3><a>Beatusish ingl</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="links"><a href="single-blog.html">Read more</a></div>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="./vacayhome/images/client2.png" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Jules Boutin</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-box">
                            <h3><a>Beatusish ingl</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="links"><a href="single-blog.html">Read more</a></div>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="./vacayhome/images/client2.png" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Jules Boutin</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!---blog block--->
<section class="blog-block">
    <div class="container">
        <div class="row offspace-45">
            <div class="view-set-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="event-blog-image">
                        <img alt="image" class="img-responsive" src="./vacayhome/images/blog1.png">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
                    <div class="event-blog-details">
                        <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
                        <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
                        <a class="btn btn-default" href="single-blog.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row offspace-45">
            <div class="view-set-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="event-blog-image">
                        <img alt="image" class="img-responsive" src="./vacayhome/images/blog2.png">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
                    <div class="event-blog-details">
                        <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
                        <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
                        <a class="btn btn-default" href="single-blog.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4,
      spaceBetween: 10,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
});

    $("div.alert").delay(3000).slideUp();
</script>
@endsection