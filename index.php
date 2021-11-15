<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Phim Nổi Bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php 
					$phimstatus = $ph->getPhimwithStatus();
					if($phimstatus){
						while($result = $phimstatus->fetch_assoc()){

						
				?>
				<div class="grid_1_of_4 images_1_of_4">
				<a href="chitiet.php?ph_id=<?php echo $result['phim_id']?>" class="chitiet"><img src="admin/upload/<?php echo $result['img']?>" alt="" width="450px"  /></a>
					 <h2><?php echo $result['phim_name']?></h2>
				</div>
				<?php 
						}
					}
				?>	
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Phim Mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
					$phimnew = $ph->getPhimNew();
					if($phimnew){
						while($result_new = $phimnew->fetch_assoc()){

						
				?>
				<div class="grid_1_of_4 images_1_of_4">
				<a href="chitiet.php?ph_id=<?php echo $result_new['phim_id']?>" class="chitiet"><img src="admin/upload/<?php echo $result_new['img']?>" alt="" /></a>
					 <h2><?php echo $result_new['phim_name']?></h2>
				</div>
				<?php 
						}
					}
				?>	
			</div>
			
    </div>
 </div>

 <?php
	include 'inc/footer.php';
?>