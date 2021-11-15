<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/quocgia.php';?>

<?php 
	$qg = new quocgia();
	if (isset($_GET['del_id'])) {
		$del_id = $_GET['del_id'];
		$deleteQuocgia =$qg->del_quocgia($del_id);

    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Quốc Gia Sản Xuất</h2>
                <div class="block">    
					<?php 
                        if(isset($deleteQuocgia)){
                            echo $deleteQuocgia;
                        }
                    ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sô Thứ Tự</th>
							<th>Mã Quốc Gia</th>
							<th>Tên Quốc Gia</th>
							<th>Trạng Thái</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_qg = $qg->show_quocgia();
						if($show_qg) {
							$i =0;
							while($result = $show_qg->fetch_assoc()){
								$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['qg_id']?></td>
							<td><?php echo $result['qg_name']?></td>
							<td><a href="quocgiaedit.php?qg_id=<?php echo $result['qg_id']?>">Sửa</a> || 
							<a href="?del_id=<?php echo $result['qg_id']?>" onclick="return confirm('Bạn có muốn xóa Quốc gia này ?')">Xóa</a>
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

