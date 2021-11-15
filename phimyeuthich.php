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
                <h3>Phim Yêu Thích</h3>
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
        
		<div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="500px">Tên Phim</th>
							<th width="500px">Hình Ảnh</th>
							<th width="500px">Hoạt Động</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
							<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
							<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<a href="">Edit</a> </td>
						</tr>
					</tbody>
				</table>
               </div>

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