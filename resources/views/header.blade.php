<div class="row" id="header">
    <div class="col-md-6">
                            <!--                            <a href="#"> </a>
                                <div class="info-block"><i class="fa fa-map"></i>701 Old York Drive Richmond USA.</div>-->
                            </div>
                            <div class="col-md-6">
                                <div class="social-grid">
                                    <ul class="list-unstyled text-right">
                                        @if(Auth::check())
                                        <a href="{{route('sign-out')}}">
                                            <button type="button" class="btn btn-success">
                                                Đăng Xuất
                                            </button>
                                        </a>
                                        @else
                                        <a href="{{route('sign-up')}}">
                                            <button type="button" class="btn btn-success" id="btnDK">
                                                Đăng Kí
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Đăng Nhập</button>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header--->
            <header class="header-container">
                <div class="container">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div id="logo">
                                    <!--<a href="{{route('page-home')}}"><img src="images/logo.png" alt="logo"></a>-->
                                    <a href="{{route('page-home')}}"><span>vacay</span>home</a>
                                </div>                       
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            <li><a  data-hover="Trang Chủ" href="{{route('page-home')}}" class="active"><span>Trang Chủ</span></a></li>
                                            <li><a data-hover="Giới Thiệu"  href="{{route('page-about')}}"><span>Giới Thiệu</span></a></li>
                                            <li><a data-hover="Phòng Trọ"  href="{{route('motel-all')}}"><span>Phòng Trọ</span></a></li>
                                            <li><a data-hover="Nội Thất"  href="{{route('product')}}"><span>Nội Thất</span></a></li>
                                            <li><a data-hover="Liên Hệ" href="{{route('page-contact')}}"><span>Liên Hệ</span></a></li>
                                            <li><a data-hover="Giỏ Hàng" href="{{route('get-shopping-cart')}}"><span>Giỏ Hàng ({{$cart}})</span></a></li>
                                        </ul>

                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                                @if(Auth::check())
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  style="background-color: #ff4157; color: white">
                                    <span>Xin chào: {{$customer['last_name']}}</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php 
                                    $hassales = DB::table('sales_channel')->where('id_customer', $customer['id'])->first();
                                    ?>
                                    @if($hassales != null)
                                    <li>
                                        <a class="dropdown-item" href="{{route('sales-channel', $customer['id'])}}">
                                            <button type="button" class="btn btn-success">Kênh Bán Hàng
                                            </button>
                                        </a>
                                        <a class="dropdown-item" href="{{route('change-information', $customer['id'])}}">
                                            <button type="button" class="btn btn-success">Đổi Thông Tin
                                            </button>
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a class="dropdown-item" href="{{route('ordered-boardinghouse',$customer['id'])}}">
                                            <button type="button" class="btn btn-success">Phòng Đã Đặt
                                            </button>
                                        </a>
                                        <a class="dropdown-item" href="{{route('get-cart',$customer['id'])}}">
                                            <button type="button" class="btn btn-success">Đơn Hàng
                                            </button>
                                        </a>
                                        <a  class="dropdown-item">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mysModal">Đăng Kí Kênh Bán Hàng
                                        </button>
                                        </a>
                                        <a class="dropdown-item" href="{{route('change-information', $customer['id'])}}">
                                            <button type="button" class="btn btn-success">Đổi Thông Tin
                                            </button>
                                        </a>
                                        <a class="dropdown-item" href="{{url('notice', $customer['id'])}}">
                                            <button type="button" class="btn btn-success">Thông Báo
                                            </button>
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item">
                                        <button type="button" class="btn btn-success">
                                            <span>Đăng Xuất</span>
                                        </button>
                                        </a>
                                    </li>
                                </ul>
                                @else
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  style="background-color: #ff4157; color: white">
                                    <span>Xin Chào</span>
                                </button> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <script language="javascript" type="text/javascript">
                    alert('Đã xảy ra lỗi trong quá trình đăng kí, vui lòng kiểm tra lại');
                </script>
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
            </div>
            @endif
            @if(Session::has('flag'))
            <div class="alert alert-{{Session::get('flag')}}"> 
                {{Session::get('thongbao')}}
            </div>
            @endif

            @if(Session::has('thongbaos'))
            <div class="alert alert-success">
                {{Session::get('thongbaos')}}
            </div>
            @endif
            <div class="container">
                <div class="modal fade" id="mysModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Đăng Kí Kênh Bán Hàng</h3>
                        </div>
                        <div class="modal-body" id="nene">
                            <div class="container" style="margin-left: 150px">
                                <form method="POST" action="{{route('sign-in-channel')}}" style="display: block" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id_customer" value="{{$customer['id']}}">
                                    <div class="form-group" id="form">
                                        <label for="">Tên: {{$customer['first_name']}} {{$customer['last_name']}}</label> <br>
                                        <label for="">Email: {{$customer['email']}}</label> <br>
                                        <label for="">Tên Nhà Trọ Hoặc Tên Shop</label> <br>
                                        <input type="text" class="form-control" placeholder="tên nhà trọ hoặc tên shop" name="name_channelsales">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-successs">Đăng Kí</button>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="color: blue;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Trang Đăng Nhập</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="margin-left: 30%">
                            <form method="POST" action="{{route('sign-in')}}" style="display: block" id="formDN" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="">Tài Khoản</label>
                                    <input type="text" class="form-input" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="">Mật Khẩu</label>
                                    <input type="password" class="form-input" name="password">
                                </div>
                                <div class="form-group">
                                    <a href="" class="btn btn-success" id="tv">Hủy</a>
                                    <button type="submit" class="btn btn-success">Đăng Nhập</button> <br> <br>
                                    <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-danger">Login with facebook</a>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-->
    <div id="myCarousel1" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active"> <img src="{{asset('vacayhome/images/anh5.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="First slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157">vacayhome<br>Kiếm Nhà Trọ Siêu Tốc</h1>
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh6.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="First slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157">vacayhome<br>Kiếm Nhà Trọ Siêu Tốc</h1>
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh7.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="First slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157">vacayhome<br>Kiếm Nhà Trọ Siêu Tốc</h1>
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh8.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="First slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157">vacayhome<br>Kiếm Nhà Trọ Siêu Tốc</h1>
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh9.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="Second slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157;">vacayhome<br>Mua Sản Phẩm Siêu Nhanh</h1> 
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh10.png')}}" style="width:100%; height: 500px; opacity: 0.8" alt="Second slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157;">vacayhome<br>Mua Sản Phẩm Siêu Nhanh</h1> 
                </div>
            </div>
            <div class="item"> <img src="./vacayhome/images/anh11.jpg" style="width:100%; height: 500px; opacity: 0.8" alt="Second slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157;">vacayhome<br>Mua Sản Phẩm Siêu Nhanh</h1> 
                </div>
            </div>
            <div class="item"> <img src="{{asset('vacayhome/images/anh12.jpg')}}" style="width:100%; height: 500px; opacity: 0.8" alt="Second slide">
                <div class="carousel-caption" style=" margin-top: -35px">
                    <h1 style="color: #ff4157;">vacayhome<br>Mua Sản Phẩm Siêu Nhanh</h1> 
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> 
                <img src="{{asset('vacayhome/images/icons/left-arrow.png')}}" onmouseover="this.src = '{{asset('vacayhome/images/icons/left-arrow-hover.png')}}'" onmouseout="this.src = '{{asset('vacayhome/images/icons/left-arrow.png')}}'" alt="left">
            </a>
            <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                <img src="{{asset('vacayhome/images/icons/right-arrow.png')}}" onmouseover="this.src = '{{asset('vacayhome/images/icons/right-arrow-hover.png')}}'" onmouseout="this.src = '{{asset('vacayhome/images/icons/right-arrow.png')}}'" alt="left">
            </a>

        </div>
    </div>
</div>
<!-- 

<script type="text/javascript">
    document.getElementById("btnDN").onclick = function () {
        document.getElementById("formDN").style.display = 'block';
    };
    document.getElementById("tv").onclick = function () {
        document.getElementById("formDN").style.display = 'none';
    };

</script> -->

<script>
    $("div.alert").delay(3000).slideUp();
</script>
