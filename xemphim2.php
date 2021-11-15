
<?php
	include 'inc/header.php';
?>
<?php 
	if (!isset($_GET['ph_id']) || $_GET['ph_id'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
		$id = $_GET['ph_id'];
	}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
		<?php 
				$get_phim_xemphim = $ph->getXemphim($id);
				if($get_phim_xemphim) {
					while($result_xemphim=$get_phim_xemphim->fetch_assoc()){
			?>
				<div>
				<iframe width="100%" height="700px" src="<?php echo $result_xemphim['link']?>">
				</iframe>
									
			</div>	
				
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