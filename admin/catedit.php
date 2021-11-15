<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
    $cat = new category();
    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $cat_id = $_GET['cat_id'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat_name = $_POST['cat_name'];

        $updateCategory = $cat->update_category($cat_name, $cat_id);
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
                
               <div class="block copyblock"> 
                    <?php 
                        $get_cat_name = $cat->getcatbyId($cat_id);
                        if($get_cat_name) {
                            while($result = $get_cat_name->fetch_assoc()){

                            
                    ?>
                    <form action="" method="post">
                        <table class="form" >
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['cat_id']?>" name="cat_id" placeholder="Enter Category ID ..." class="medium" disabled/>
                                </td>
                            </tr>					
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['cat_name']?>" name="cat_name" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            </tr>
                            <tr> 
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
                    <?php 
                        if(isset($updateCategory)){
                            echo $updateCategory;
                        }
                    ?>
                </div>
            </div>
        </div>