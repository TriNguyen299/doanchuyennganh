
<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php 
	 if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
		 echo "<script>window.location = '404.php'</script>";
	 } else {
		 $id = $_GET['catid'];
	 }
 
	//  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 	 $cat_name = $_POST['cat_name'];
 
	// 	 $updateCategory = $cat->update_category($cat_name, $cat_id);
	//  }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		<?php 
				$getcatname = $cat->get_cat_name($id);
				if($getcatname) {
					while($result_name = $getcatname->fetch_assoc()) {	
			?>
    		<div class="heading">
    		<h3><?php echo $result_name['cat_name']?></h3>
			</div>
			<?php 
					}
				}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php 
					$getphimbycat = $cat->get_phim_by_cat($id);
					if($getphimbycat) {
						while($result = $getphimbycat->fetch_assoc()) {	
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="chitiet.php?ph_id=<?php echo $result['phim_id']?>"><img src="admin/upload/<?php echo $result['img']?>"height="200px" width="400px"alt="" /></a>
					 <h2><?php echo $result['phim_name']?></h2>
				     <div class="button"><span><a href="chitiet.php?ph_id=<?php echo $result['phim_id']?>" class="chitiet">Chi Tiết</a></span></div>
				</div>
				<?php 
						}
					} else {
						echo 'Chưa có Phim thuộc loại này';
					}
				?>
			</div>

	
	
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>