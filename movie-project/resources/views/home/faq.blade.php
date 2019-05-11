@extends('home.layout')
@section('title','Hướng dẫn sử dụng')
@section('content')
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Hướng dẫn sử dụng</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{ route('home_index') }}">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Hướng dẫn sử dụng</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="faq">				
				<h4><a data-toggle="collapse" href="#faq1" ><i class="icon ion-help-circled"></i> BESTFILM là gì?</a></h4>
				<div id="faq1" class="collapse">
					<p>Bestfilm - Xem phim online. Hiện tại Bestfilm có hơn 5 triệu người dùng với hàng trăm triệu lượt xem mỗi tháng. Là trang xem phim online, Bestfilm mang tới cho người dùng nhiều phim trong nước cũng như quốc tế trên website http://bestfilm.local.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq2" ><i class="icon ion-help-circled"></i> BESTFILM có những nội dung gì?</a></h4>
				<div id="faq2" class="collapse">
					<p>Bestfilm hiện tại có hơn 3.000.000 giờ, 30 nhóm nội dung và thể loại:</p>
					<ul>
					<li>Phim: Hollywood, Âu Mỹ, Châu Á, …thuộc 18 thể loại hành động, tâm lý, hài hước, võ thuật, hoạt hình, phiêu lưu, viễn tưởng, thần thoại, cổ trang, kinh dị, hình sự, chiến tranh, ca nhạc, gia đình…</li>
					<li>Phim bộ Việt nam: Hơn 100 phim bộ nổi tiếng qua các thời kỳ như Biệt động sài gòn, Những ngọn nền trong đêm.</li>
					<li>Phim điện ảnh Việt Nam: Chị Dậu, Làng Vũ Đại Ngày Ấy, Tình + Tình, Áo Lụa Hà Đông….</li>
					<li> Hài: với 3 thể loại tiểu phẩm, show hài hước, khoảnh khắc vui nhộn.</li>
					<li>Ca nhạc dân tộc: Cải lương, chèo, tân cổ…</li>
					<li>Thiếu nhi: Kho nội dung thiếu nhi, hoạt hình và khoa giáo</li>
					<li>Thể thao: Nhiều giải thể thao </li>
					<li>Khác: khoa giáo, cộng đồng</li>
					<li>Đặc biệt là các nội dung độc quyền, do Bestfilm đầu tư sản xuất và Audio movie – Xem phim bằng tai lần đầu tiên có mặt tại Việt Nam.</li>
				</ul>
				</div>

				<h4><a data-toggle="collapse" href="#faq3" ><i class="icon ion-help-circled"></i> Tôi có thể download phim về máy không?</a></h4>
				<div id="faq3" class="collapse">
					<p>Hiện tại Bestfilm chỉ hỗ trợ xem phim online, chưa hỗ trợ download.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq4" ><i class="icon ion-help-circled"></i> Tôi có thể đăng kí tài khoản bằng facebook được không?</a></h4>
				<div id="faq4" class="collapse">
					<p>Hiện tại Bestfilm không hỗ trợ đăng nhập hay đăng kí bằng tài khoản facebook.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq5" ><i class="icon ion-help-circled"></i> Phim trên Bestfilm có phụ đề không?</a></h4>
				<div id="faq5" class="collapse">
					<p>Tất cả phim trên Bestfilm đều được encode hardsub hoặc thuyết minh nên quý khách không cần phải lo về phụ đề.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq6" ><i class="icon ion-help-circled"></i> Xem phim trên Bestfilm có mất cước 3G/4G không?</a></h4>
				<div id="faq6" class="collapse">
					<p>Bestfilm không phải dịch vụ nhà mạng nên nên không miễn cước 3G. Bạn sử dụng dịch vụ khi còn data tốc độ cao để đảm bảo chất lượng xem ổn định nhât..</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq7" ><i class="icon ion-help-circled"></i> Tôi có thể truy cập Bestfilm từ nước ngoài không?</a></h4>
				<div id="faq7" class="collapse">
					<p>Bestfilm hiện tại không ban bất kì ip của quốc gia nào nên quý khách có thể truy cập Bestfilm từ bất cứ nơi nào có mạng.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq8" ><i class="icon ion-help-circled"></i> Bestfilm có ứng dụng điện thoại hay TV không?</a></h4>
				<div id="faq8" class="collapse">
					<p>Bestfilm đang có kế hoạch phát triển thêm các nền tảng khác. Mong quý khách hãy chờ thêm một thời gian.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq9" ><i class="icon ion-help-circled"></i> Tôi đã vào trang xem phim nhưng không thể xem được, liệu có cách giải quyết không?</a></h4>
				<div id="faq9" class="collapse">
					<p>Mỗi tập phim của Bestfilm đều được lưu ở nhiều server, nếu quý khách không xem được, xin vui lòng chuyển sang server khác để xem.</p>
				</div>

				<h4><a data-toggle="collapse" href="#faq10" ><i class="icon ion-help-circled"></i> Thông tin hỗ trợ thêm</a></h4>
				<div id="faq10" class="collapse">
					<p>Bạn có thắc mắc, muốn hỗ trợ liên quan dịch vụ, vui lòng liên hệ tổng đài 1900 000000 chọn nhánh 0 (từ 8AM - 6PM, tất cả các ngày trong tuần).</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection