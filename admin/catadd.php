<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];

        $insertCategory = $cat->insert_category($cat_id, $cat_name);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thể Loại Mới</h2>
                
               <div class="block copyblock"> 
                 <form action="catadd.php" method="post">
                    <table class="form" >
                        <tr>
                            <td>
                                <input type="text" name="cat_id" placeholder="Thêm Mã Thể Loại..." class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Thêm Tên Thể Loại..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                    if(isset($insertCategory)){
                        echo $insertCategory;
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>