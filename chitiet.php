
<?php
	include 'inc/header.php';
?>
<?php 
		if (!isset($_GET['ph_id']) || $_GET['ph_id'] == NULL) {
			echo "<script>window.location = '404.php'</script>";
		} else {
			$id = $_GET['ph_id'];
		}
	$user_id=Session::get('user_id');
	$login_check = Session::get('user_id');
	if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['phimyeuthich'])){
		$phim_id=$_POST['phim_id'];
		$insert_phimyt=$ph->$insert_phimyt($phim_id,$user_id);
	}
?>

<div class="main">
    <div class="content">
    	<div class="section group">
		<?php 
				$get_phim_chitiet = $ph->getChitiet($id);
				if($get_phim_chitiet) {
					while($result_chitiet=$get_phim_chitiet->fetch_assoc()){
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
					<img src="admin/upload/<?php echo $result_chitiet['img']?>" alt="">
					</div>
				<div class="desc span_3_of_2">
				<h2><?php echo $result_chitiet['phim_name']?></h2>
					<p><?php echo $fm->textShorten($result_chitiet['description'],2000)?></p>					
					<div class="link">
						<p>Thể Loại: <span><?php echo $result_chitiet['cat_name']?></span></p>
						<p>Quốc Gia: <span><?php echo $result_chitiet['qg_name']?></span></p>
						<p>Danh Mục: <span><?php echo $result_chitiet['dm_name']?></span></p>
					</div>
					<div class="add-cart">
						<form action="xemphim2.php?ph_id=<?php echo $result_chitiet['phim_id']?>" method="post">
							<input  type="submit" class="xemphimsubmit" name="submit" value="Xem Phim"/>
								
						</form>			
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="hidden" name="phim_id" value="<?php echo $result_chitiet['phim_id'] ?>"/>	
							
							<?php 
							$login_check = Session::get('user_login');
								if($login_check == false) {
									echo '';
								} else {
									echo '<input  type="submit" class="xemphimsubmit" name="submit" value="Phim Yêu Thích"/>';
								}
								
						?>
						</form>			
					</div>
				
			</div>	
				
	</div>
	<?php
					}
				}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Thể Loại</h2>
					<ul>
					<?php 
					 	$getall_cat = $cat->show_category_fontend();
						if($getall_cat) {
							while($result_allcat = $getall_cat->fetch_assoc()) {
					?>
					<li><a href="theloaiphim.php?catid=<?php echo $result_allcat['cat_id']?>"><?php echo $result_allcat['cat_name']?></a></li>
					<?php 
							}
						}
					?>
    				</ul>
    	
 				</div>
				 <div class="rightsidebar span_3_of_1">
					<h2>Quốc Gia</h2>
					<ul>
					<?php 
					 	$getall_qg = $qg->show_quocgia_fontend();
						if($getall_qg) {
							while($result_allqg = $getall_qg->fetch_assoc()) {
					?>
					<li><a href="quocgiaphim.php?qgid=<?php echo $result_allqg['qg_id']?>"><?php echo $result_allqg['qg_name']?></a></li>
					<?php 
							}
						}
					?>
    				</ul>
    	
 				</div>
				 <div class="rightsidebar span_3_of_1">
					<h2>Danh Mục</h2>
					<ul>
					<?php 
					 	$getall_dm = $dm->show_danhmuc_fontend();
						if($getall_dm) {
							while($result_alldm = $getall_dm->fetch_assoc()) {
					?>
					<li><a href="danhmucphim.php?dmid=<?php echo $result_alldm['dm_id']?>"><?php echo $result_alldm['dm_name']?></a></li>
					<?php 
							}
						}
					?>
    				</ul>
    	
 				</div>
				 
 		</div>
 	</div>
	</div>
	 <?php
	include 'inc/footer.php';
?>