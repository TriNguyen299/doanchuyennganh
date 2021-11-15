<?php 
	 include 'inc/header.php';
 ?>
<?php 
	$login_check = Session::get('user_login');
	if($login_check) {
		header('Location:dangnhap2.php');
	} 
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $insertUser = $usr->insert_user($_POST);
    }
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $loginUser = $usr->login_user($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng Ký Thành Viên</h3>
        	<p>Đăng nhập theo thông tin phía dưới.</p>
			<br>
        	<form action="" method="POST"  height="200px">
                	<input name="email" type="text" value="" class="field" placeholder="Nhập Email . . .">
                    <input name="password" type="password" value="" class="field" placeholder="Nhập PassWord. . .">
                 <br>
                 <p class="note">Quên mật khẩu <a href="#">ấn vô đây</a></p>
				 <br>
                    <div class="buttons"><input type="submit"  name="login" class="btn_submit" value="Đăng Nhập"></div>
			</form>
			<?php 
				if(isset($loginUser)){
					echo $loginUser;
				}
			?>		
				
		</div>
					

    	<div class="register_account">
			<h3>Tạo Tài Khoản Mới</h3>
			<?php 
				if(isset($insertUser)){
					echo $insertUser;
				}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
								<input type="text" name="email" value="" placeholder="Nhập Email . . .">
							</div>

							<div>
							<input type="text" name="name" value="" placeholder="Nhập Tên . . ." >
							</div>

							

							<div>
								<input type="text" name="password" value="" placeholder="Nhập Mật Khẩu . . .">
							</div>
							<div>
								<input type="text" name="re-pasword" value="" placeholder="Nhập Lại Mật Khẩu . . .">
							</div>

							
							
							
							
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" value="" placeholder="Nhập Địa Chỉ . . .">
						</div>
						<div>
							   <input type="text" name="city" value="" placeholder="Nhập Thành Phố . . .">
						</div>
						<div>
							   <input type="text" name="country" value="" placeholder="Nhập Quốc Gia . . .">
						</div>
		    				        
	
		           		<div>
		          			<input type="text" name="phone" value="" placeholder="Nhập Điện Thoại . . .">
		         		</div>
				  
				  
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><input type="submit" name="submit" class="btn_submit" value="Tạo Tài Khoản"></div>
		    <p class="terms">Bằng cách nhấp chọn 'Tạo Tài Khoản' <a href="#">Điều khoản &amp; Điều kiện</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
 	include 'inc/footer.php';
 ?>