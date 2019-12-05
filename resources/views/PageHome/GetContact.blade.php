@extends('master')
@section('content')
<section class="contact-block">
	<div class="container">
		<div class="col-md-6 contact-left-block">
			<h3><span>Liên hệ website</span> Vacayhome</h3>
			<p class="text-left">Trường Đại học Kỹ thuật – Công nghệ Cần Thơ.</p>
			<p class="text-right">256 Nguyễn Văn Cừ, Quận Ninh Kiều, Thành phố Cần Thơ. <i class="fa fa-map-marker fa-lg"></i></p>
			<p class="text-right"><a href="tel:+1-202-555-0100"> (+84) 58-277-4228 <i class="fa fa-phone fa-lg"></i></a></p>
			<p class="text-right"><a href="mailto:demo@info.com"> tnduy.16.06.1998@gmail.com <i class="fa fa-envelope"></i></a></p>
		</div>
		<div class="col-md-6 contact-form">
			<h3>Gửi Thông tin về <span>Vacayhome</span></h3>
			<form action="#" method="post">
				<input type="text" class="form-control" name="Name" placeholder="Tên" required="">
				<input type="email" class="form-control" name="Email" placeholder="Email" required="">
				<textarea class="form-control" name="Message" placeholder="Nội dung...." required=""></textarea>
				<input type="submit" class="submit-btn" value="Gửi" disabled="">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</section>

<!---map--->
<section class="offspace-70">
	<div class="map">
		<div class="container">
			<section class="offspace-70">
				<div class="map">
					<div class="container">
						<div id="sethPhatMap" class="map" style="border:0; width: 100%; height: 400px" allowfullscreen></div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>
@endsection
<script type="text/javascript">
	var mapObj = null;
    var defaultCoord = [10.045162, 105.746857]; // coord mặc định, 9 giữa Can tho
    var zoomLevel = 10;
    var mapConfig = {
        attributionControl: false, // để ko hiện watermark nữa
        center: defaultCoord, // vị trí map mặc định hiện tại
        zoom: zoomLevel, // level zoom
    };
    
    window.onload = function() {
        // init map
        mapObj = L.map('sethPhatMap', {attributionControl: false}).setView(defaultCoord, zoomLevel);
        
        // add tile để map có thể hoạt động, xài free từ OSM
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        	attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapObj);
        // var marker = L.marker([10.04687 ,105.76810]).addTo(mapObj);
        var marker = L.marker([10.04681 ,105.76807]).addTo(mapObj);
        // var marker = L.marker([$a ,$b]).addTo(mapObj);
        
        // tạo popup và gán vào marker vừa tạo
        var popup = L.popup();
        popup.setContent("Vị trí website vacayhome ");
        marker.bindPopup(popup);
    };
</script>