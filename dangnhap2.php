<?php 
	 include 'inc/header.php';
?>
<?php 
	$login_check = Session::get('user_login');
	if($login_check==false) {
		header('Location:login.php');
	} 
?>
 <div class="main">
    <div class="content">
        <div class="cartoption">		
			<div class="cartpage">		
			<div>
			    <div class="order-page">
                   <h1 style="color:green; font-size:xx-large; text-align:center; height:130px;"> Chào Mừng Bạn Đến Với Website Của Chúng Tôi </h1>
			
                </div>
			</div>
            </div>
        </div>	
       <div class="clear"></div>
    </div>
 </div>

 <?php 
 	include 'inc/footer.php';
 ?>


 
