<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/quocgia.php';?>
<?php include '../classes/danhmuc.php';?>
<?php include '../classes/phim.php';?>
<?php include_once '../helpers/format.php';?>
<?php 
	$ph = new phim();
	$fm = new Format();
	if (isset($_GET['phim_id'])) {
		$id = $_GET['phim_id'];
		$deletePhim =$ph->del_phim($id);

    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Phim</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Số Thứ Tự</th>
					<th>Mã Phim</th>
					<th>Tên Phim</th>
					<th>Mô Tả</th>
					<th>Link</th>
					<th>Hình Ảnh</th>
					<th>Trạng Thái Phim</th>
					<th>Quốc Gia</th>
					<th>Thể Loại</th>
					<th>Danh Mục</th>
					<th>Trạng Thái</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(isset($deletePhim)){
						echo $deletePhim;
					}
                ?>    
				<?php 
					$ph_list = $ph->show_phim();
					if($ph_list){
						$i=0;
						while($result = $ph_list->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['phim_id']?></td>
					<td><?php echo $fm->textShorten($result['phim_name'], 30)?></td>
					<td><?php echo $fm->textShorten($result['description'], 15);?></td>
					<td><?php echo $result['link']?></td>
					<td><img src="upload/<?php echo $result['img']?>" width="50px"></td>					
					<td>
						<?php 
						if($result['status']==1){
							echo 'Nổi Bật';
						} else {
							echo 'Không Nổi Bật';
						}
						?>					
					</td>
					<td><?php echo $result['cat_name']?></td>
					<td><?php echo $result['qg_name']?></td>
					<td><?php echo $result['dm_name']?></td>
					<td><a href="phimedit.php?phim_id=<?php echo $result['phim_id']?>">Sửa</a> 
					|| <a href="?phim_id=<?php echo $result['phim_id']?>">Xóa</a></td>
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
