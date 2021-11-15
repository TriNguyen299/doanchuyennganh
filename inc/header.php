<?php 
    include 'lib/session.php';
    Session::init();
?>
<?php 
  include_once 'lib/database.php';
	include_once 'helpers/format.php';
	
	spl_autoload_register(function($className) {
		include_once "classes/".$className.".php";
	}) ;
	$db = new Database();
	$fm = new Format();
	$usr = new user();
	$cat = new category();
  $qg = new quocgia();
  $dm = new danhmuc();
	$ph = new phim();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Phim Hay Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				<form action="timkiem.php" method="POST">
						<input type="text" placeholder="Tìm Phim . . ." name="tukhoa">
						<input type="submit" name="searchphim" value="Tìm Phim">
				    </form>
          </div>
          <?php 
				  		if(isset($_GET['userId'])) {
							  Session::destroy();
						}
				  ?>
		   <div class="login">
        <?php 
				$login_check = Session::get('user_login');
				if($login_check == false) {
					echo '<a href="login.php">Đăng Nhập</a></div>';
				} else {
					echo '<a href="?userId='.Session::get("user_id").'">Đăng Xuất</a></div>';
				}
			?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang Chủ</a></li>
      <li><a href="#">Thể Loại</a>
        <ul id="sub">             
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=hd">Phim Hành Động</a></li>
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=tc">Phim Tình Cảm</a></li>
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=khvt">Phim Khoa Học</a></li>
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=hh">Phim Hoạt Hình</a></li>
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=kd">Phim Kinh Dị</a></li>
            <li><a href="http://localhost/phimhay6/theloaiphim.php?catid=tt">Phim Thần Thoại</a></li>
        </ul>
      </li>
      <li><a href="#">Quốc Gia</a>
      <ul id="sub">             
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=vn">Phim Việt Nam</a></li>
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=nb">Phim Hàn Quốc</a></li>
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=hq">Phim Nhật Bản</a></li>
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=usa">Phim Mỹ</a></li>
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=tl">Phim Thái Lan</a></li>
            <li><a href="http://localhost/phimhay6/quocgiaphim.php?qgid=tq">Phim Trung Quốc</a></li>
        </ul>
      </li>
      <li><a href="http://localhost/phimhay6/danhmucphim.php?dmid=pb">Phim Bộ</a></li>
      <li><a href="http://localhost/phimhay6/danhmucphim.php?dmid=pl">Phim Lẻ</a></li>
      <li><a href="http://localhost/phimhay6/danhmucphim.php?dmid=pc">Phim Chiếu Rạp</a></li>
	  <?php 
			$login_check = Session::get('user_login');
			if($login_check == false) {
				echo '';
			} else {
				echo '<li><a href="thongtin.php">Thông Tin</a></li>';
			}
		?>
		<?php 
			$login_check = Session::get('user_login');
			if($login_check == false) {
				echo '';
			} else {
				echo '<li><a href="phimyeuthich.php">Phim Yêu Thích</a></li>';
			}
		?>
	  <li><a href="lienhe.php">Liên Hệ Quảng Cáo Và Hỗ Trợ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>