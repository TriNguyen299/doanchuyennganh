<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/danhmuc.php';?>

<?php 
	$dm = new danhmuc();
	if (isset($_GET['del_id'])) {
		$del_id = $_GET['del_id'];
		$deleteDanhmuc =$dm->del_danhmuc($del_id);

    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Danh Mục</h2>
                <div class="block">    
					<?php 
                        if(isset($deleteDanhmuc)){
                            echo $deleteDanhmuc;
                        }
                    ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sô Thứ Tự</th>
							<th>Mã Danh Mục</th>
							<th>Tên Danh Mục</th>
							<th>Trạng Thái</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_dm = $dm->show_danhmuc();
						if($show_dm) {
							$i =0;
							while($result = $show_dm->fetch_assoc()){
								$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['dm_id']?></td>
							<td><?php echo $result['dm_name']?></td>
							<td><a href="danhmucedit.php?dm_id=<?php echo $result['dm_id']?>">Sửa</a> || 
							<a href="?del_id=<?php echo $result['dm_id']?>" onclick="return confirm('Bạn có muốn xóa Danh Mục này ?')">Xóa</a>
							</td>
						</tr>
					<?php 
							}
						}
					?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

