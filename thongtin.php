<?php 
	 include 'inc/header.php';
?>
<?php 
    $login_check = Session::get('user_login');
    if($login_check == false) {
        header('Location:login.php');
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
            <table class="tblone">
                <?php 
                    $id = Session::get('user_id');
                    $get_user = $usr->show_User($id);
                    if($get_user){
                        while($result = $get_user->fetch_assoc()){

                        
                ?>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td>Tên</td>
                    <td>:</td>
                    <td><?php echo $result['name']?></td>
                </tr>
               
                <tr>
                    <td>Số Điện Thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td>Thành Phố</td>
                    <td>:</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Quốc Gia</td>
                    <td>:</td>
                    <td><?php echo $result['country']?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editthongtin.php">Sửa Thông Tin</a></td>
                </tr>
                
                <?php 
                        }
                    }
                ?>
            </table>
		</div>
    </div>
	 
<?php 
 	include 'inc/footer.php';
 ?>