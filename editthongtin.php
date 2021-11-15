<?php 
	 include 'inc/header.php';
 ?>
 <?php 
    $login_check = Session::get('user_login');
    if($login_check == false) {
        header('Location:login.php');
    }
?>
 
	<!-- if (!isset($_GET['bk_id']) || $_GET['bk_id'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
		$id = $_GET['bk_id'];
	} -->
<?php 
    $id = Session::get('user_id');
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
		
		$updateUser = $usr->update_user($_POST, $id);	
    }
?>	
	


<div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
                <div class="heading">
                <h3>Thông Tin Cá Nhân</h3>
                </div>
                <div class="clear"></div>
            </div>
            <form action="" method="POST">
                <table class="tblone">
                    <tr>
                        <?php 
                            if(isset($updateUser)){
                                echo '<td colspan="3">'.$updateUser.'</td>';
                            }
                        ?>
                    </tr>
                    <?php 
                        $id = Session::get('user_id');
                        $get_user = $usr->show_User($id);
                        if($get_user){
                            while($result = $get_user->fetch_assoc()){

                            
                    ?>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>:</td>
                        <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
                        
                    </tr>
                
                    <tr>
                        <td>Số Điện Thoại</td>
                        <td>:</td>
                        <td><input type="text" name="phone" value="<?php echo $result['phone']?>"></td>
            
                    </tr>
                    <tr>
                        <td>Địa Chỉ</td>
                        <td>:</td>
                        <td><input type="text" name="address" value="<?php echo $result['address']?>"></td>
                    </tr>
                    <tr>
                        <td>Thành Phố</td>
                        <td>:</td>
                        <td><input type="text" name="city" value="<?php echo $result['city']?>"></td>
                    </tr>
                    <tr>
                        <td>Quốc Gia</td>
                        <td>:</td>
                        <td><input type="text" name="country" value="<?php echo $result['country']?>"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="save" value=Lưu class="btn_submit"></td>
                    </tr>
                    
                    <?php 
                            }
                        }
                    ?>
                </table>
            </form>
		</div>
    </div>
	 
<?php 
 	include 'inc/footer.php';
 ?>