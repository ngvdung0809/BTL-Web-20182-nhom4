@extends('home.layout')
@section('title','Giới thiệu')
@section('content')
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Giới thiệu</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{ route('home_index') }}">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Giới thiệu</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="about">				
				<h2> <img src="{{ asset('home/images/logo.png') }}" alt="" height="200px" width="100px"> BESTFILM là gì?</h2>
				<p>Bestfilm.local là dịch vụ xem phim online hàng đầu hiện nay. Bestfilm.local cung cấp kho nội dung giải trí hấp dẫn và lôi cuốn của truyền hình, phim, video hài, thể thao, TV Show… và 100% đều có bản quyền.</p>
				<p>Bestfilm.local theo đuổi một sứ mệnh cung cấp cho khách hàng trải nghiệm xem phim và video đỉnh cao với chất lượng tuyệt hảo.</p>
				<p>Với khẩu hiệu “AMAZING JOYS. EVERYDAY. ANYWHERE.” (NIỀM VUI TUYỆT VỜI. MỖI NGÀY. MỌI NƠI), Bestfilm.local luôn nỗ lực hết mình để phục vụ cho niềm vui của tất cả mọi người, mọi nhà trong từng ngày, từng khoảnh khắc cuộc sống và bất kể ở nơi đâu. Vì chúng tôi hiểu rằng niềm vui chính là chất keo tuyệt vời nhất cho sự chia sẻ và gắn kết mọi người với nhau.</p>
				<br><br>
				<h2> <img src="{{ asset('home/images/logo.png') }}" alt="" height="200px" width="100px"> BESTFILM có gì thú vị?</h2>
				<p>Với thông điệp “Niềm vui tuyệt vời. Mỗi ngày. Mọi nơi” Bestfilm mang đến cho người dùng những trải nghiệm tuyệt vời và đầy thú vị.</p>
				<br>
				<p><b><i> Kho nội dung phong phú, nguồn cảm hứng “Khơi câu chuyện, thêm gắn kết”</i></b></p>
				<br>
				<h5><u>Hơn 3.000.000 giờ, 30 nhóm nội dung và thể loại:</u></h5>
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
				<br>
				<br>
				<h4>Audio Movie, xem phim bằng tai – “Chăm sóc đến từng phút rảnh rỗi của bạn”</h4>
				<p>Kho phim Audio Movie được đầu tư công phu và bài bản sẽ chính thức ra mắt khán giả Việt Nam lần đầu tiên. Bằng việc kết hợp tất cả những yếu tố đặc sắc từ bối cảnh, nhân vật, lời thoại, hiệu ứng âm thanh, âm nhạc…để dựng lại một bộ phim một cách sống động nhất qua “ngôn ngữ” của âm thanh. Qua đó, mỗi người dùng sẽ “xem” được bộ phim một theo cách rất khác nhau, nhưng đó là sự khác nhau đầy thú vị. Cùng với yếu tố đa nền tảng của Bestfilm, kho nội dung Audio Movie chính là cách chúng tôi chăm sóc đến từng phút rảnh rỗi của người dùng, để họ vừa có thể hoàn thành công việc nhưng vẫn thưởng thức trọn vẹn một bộ phim mình yêu thích. Ngoài ra, “Audio Movie – Xem phim bằng tai” còn mang một thông điệp đầy tính nhân văn mà Bestfilm muốn gửi gắm đến khách hàng, đó là trao cho những người khiếm thị niềm vui được thưởng thức những bộ phim hấp dẫn nhất, mà có lẽ cả cuộc đời họ sẽ chẳng bao giờ xem được như bao người khác.</p>
				<br><br>
				<h4>100% nội dung bản quyền – “Chúng tôi hướng đến người xem có giá trị”</h4>
				<p>Bestfilm trân trọng các giá trị lao động trí tuệ, bản quyền của các nghệ sĩ, diễn viên, nhà sản xuất tại Việt Nam và trên thế giới, đồng thời hướng đến việc cung cấp cho người dùng một dịch vụ nội dung hay và thực sự có chất lượng.</p>
			</div>
		</div>
	</div>
</div>

@endsection