 
</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Thông Tin</h4>
						<ul>
						<li><a href="#">Giới thiệu</a></li>
						<li><a href="#">Dịch vụ khách hàng</a></li>
						<li><a href="#">Tìm kiếm nâng cao</a></li>
						<li><a href="lienhe.php">Liên hệ quảng cáo</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tại sao nên xem phim ở web chúng tôi</h4>
						<ul>
						<li><a href="about.php">Giới thiệu</a></li>
						<li><a href="faq.php">Dịch vụ khách hàng</a></li>
						<li><a href="#">Chính sách</a></li>
						<li><a href="preview.php">Phim được tìm kiếm nhiều</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài Khoản</h4>
						<ul>
							<li><a href="login.php">Đăng nhập</a></li>
							<li><a href="index.php">Xem phim</a></li>
							<li><a href="#">Phim yêu thích</a></li>
							<li><a href="#">Theo dõi phim mới</a></li>
							<li><a href="lienhe.php">Hổ trợ</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên Hệ</h4>
						<ul>
							<li><span>0368777354</span></li>
							<li><span>0924501595</span></li>
						</ul>
						<div class="social-icons">
							<h4>Theo Dõi Chúng Tôi</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://www.facebook.com/01678614440ht/" target="_blank"> </a></li>
							      <li class="twitter"><a href="contact.php" target="_blank"> </a></li>
							      <li class="googleplus"><a href="contact.php" target="_blank"> </a></li>
							      <li class="contact"><a href="contact.php" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Copyright 2020 © Xem Phim Trực Tuyến mới nhất tại TVHAY - Xem Phim mới online mỗi ngày - phim mới cập nhật nhanh - xem Phim việt nam - Phim chiếu rạp - Phim trung quốc HD bản đẹp - Xem Phim Mới Nhất - Xem Phim Miễn Phí </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
