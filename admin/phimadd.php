<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/quocgia.php';?>
<?php include '../classes/danhmuc.php';?>
<?php include '../classes/phim.php';?>
<?php 

    $ph = new phim();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $insertPhim = $ph->insert_phim($_POST, $_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Phim Mới</h2>
        <div class="block"> 
            <?php 
                    if(isset($insertPhim)){
                        echo $insertPhim;
                    }
            ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>ID</label>
                    </td>
                    <td>
                        <input type="text" name="phim_id" placeholder="Nhập Mã Phim" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="phim_name" placeholder="Nhập Tên Phim" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thế Loại</label>
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
                            <option value="<?php echo $result['cat_id']?>"><?php echo $result['cat_name']?></option>
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
                            <option value="<?php echo $result['dm_id']?>"><?php echo $result['dm_name']?></option>
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
                            <option value="<?php echo $result['qg_id']?>"><?php echo $result['qg_name']?></option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Link Phim</label>
                    </td>
                    <td>
                        <input type="text" name="link" placeholder="Nhập Link Phim..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình Ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="img"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng Thái</label>
                    </td>
                    <td>
                        <select id="select" name="status">
                            <option>Chọn Trạng Thái</option>
                            <option value="1">Nổi Bật</option>
                            <option value="0">Không Nổi Bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
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


