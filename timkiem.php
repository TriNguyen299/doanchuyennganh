<?php 
	 include 'inc/header.php';
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
			<?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $tukhoa = $_POST['tukhoa'];
            
                    $searchphim = $ph->search_phim($tukhoa);
                }
           ?>
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm: <?php echo $tukhoa?></h3>
			</div>
			
    		<div class="clear"></div>
    	</div>
	      <div class="section group new-phim-cart">
				<?php 
					if($searchphim) {
						while($result = $searchphim->fetch_assoc()) {	
				?>
				<div class="grid_1_of_4 images_1_of_4">
				<a href="chitiet.php?ph_id=<?php echo $result['phim_id']?>" class="chitiet"><img src="admin/upload/<?php echo $result['img']?>" alt=""  height="200px" width="450px" /></a>
					 <h2><?php echo $result['phim_name']?></h2>
				</div>
				<?php 
						}
					} else {
						echo 'Không tìm thấy phim có tên chứa từ khóa '.$tukhoa.' '.'này';
					}
				?>
			</div>

	
	
    </div>
 </div>

<?php 
 	include 'inc/footer.php';
 ?>