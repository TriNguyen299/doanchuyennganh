<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/quocgia.php';?>
<?php include '../classes/danhmuc.php';?>
<?php include '../classes/phim.php';?>
<?php 
    $ph = new phim();
    if (!isset($_GET['phim_id']) || $_GET['phim_id'] == NULL) {
        echo "<script>window.location = 'phimlist.php'</script>";
    } else {
        $id = $_GET['phim_id'];

    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $updatePhim = $ph->update_phim($_POST, $_FILES, $id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Phim</h2>
        <div class="block"> 
            <?php 
                    if(isset($updatePhim)){
                        echo $updatePhim;
                    }
            ?>    
            
            <?php 
                $get_phim_by_id = $ph->getphimbyId($id); 
                if($get_phim_by_id) {
                    while ($result_phim = $get_phim_by_id->fetch_assoc()) {
            ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Mã Phim</label>
                    </td>
                    <td>
                        <input type="text" name="phim_id" value="<?php echo $result_phim['phim_id']?>" class="medium" disabled/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên Phim</label>
                    </td>
                    <td>
                        <input type="text" name="phim_name" value="<?php echo $result_phim['phim_name']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thể Loại</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-----Chọn Thể Loại-----</option>
                            <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result = $catlist->fetch_assoc()){                                   
                            ?>
                            <option 
                                <?php 
                                    if($result['cat_id'] == $result_phim['cat_id']) { echo 'selected'; }
                                ?>
                            value="<?php echo $result['cat_id']?>"><?php echo $result['cat_name']?>
                            </option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Quốc Gia</label>
                    </td>
                    <td>
                        <select id="select" name="quocgia">
                            <option>-----Chọn Quốc Gia-----</option>
                            <?php 
                                $qg = new quocgia();
                                $qglist = $qg->show_quocgia();
                                if($qglist){
                                    while($result = $qglist->fetch_assoc()){                                   
                            ?>
                            <option 
                                <?php 
                                    if($result['qg_id'] == $result_phim['qg_id']) { echo 'selected'; }
                                ?>
                            value="<?php echo $result['qg_id']?>"><?php echo $result['qg_name']?>
                            </option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh Mục</label>
                    </td>
                    <td>
                        <select id="select" name="danhmuc">
                            <option>-----Chọn Danh Mục-----</option>
                            <?php 
                                $dm = new danhmuc();
                                $dmlist = $dm->show_danhmuc();
                                if($dmlist){
                                    while($result = $dmlist->fetch_assoc()){                                   
                            ?>
                            <option 
                                <?php 
                                    if($result['dm_id'] == $result_phim['dm_id']) { echo 'selected'; }
                                ?>
                            value="<?php echo $result['dm_id']?>"><?php echo $result['dm_name']?>
                            </option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô Tả</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"><?php echo $result_phim['description']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Link Phim</label>
                    </td>
                    <td>
                        <input type="text" name="link" value="<?php echo $result_phim['link']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Úp Hình Ảnh</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_phim['img'] ?>" width="90px" height="150px">
                        <input type="file" name="img"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng Thái Phim</label>
                    </td>
                    <td>
                        <select id="select" name="status">
                            <option>----Chọn Trạng Thái----</option>
                            <?php 
                                if($result_phim['status']==1){                            
                            ?>
                            <option selected value="1">Nổi Bật</option>
                            <option value="0">Không Nổi Bật</option>
                            <?php 
                            } else {
                            ?>
                            <option  value="1">Nổi Bật</option>
                            <option selected value="0">Không Nổi Bật</option>
                            <?php 
                             }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập Nhật" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
                  }
                }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


