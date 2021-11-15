<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/danhmuc.php';?>
<?php 
    $dm = new danhmuc();
    if (!isset($_GET['dm_id']) || $_GET['dm_id'] == NULL) {
        echo "<script>window.location = 'danhmuclist.php'</script>";
    } else {
        $dm_id = $_GET['dm_id'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dm_name = $_POST['dm_name'];

        $updateDanhmuc = $dm->update_danhmuc($dm_name, $dm_id);
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
                
               <div class="block copyblock"> 
                    <?php 
                        $get_dm_name = $dm->getdmbyId($dm_id);
                        if($get_dm_name) {
                            while($result = $get_dm_name->fetch_assoc()){

                            
                    ?>
                    <form action="" method="post">
                        <table class="form" >
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['dm_id']?>" name="dm_id" placeholder="Nhập Mã Danh Mục..." class="medium" disabled/>
                                </td>
                            </tr>					
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['dm_name']?>" name="dm_name" placeholder="Nhập Tên Danh Mục..." class="medium" />
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
                        if(isset($updateDanhmuc)){
                            echo $updateDanhmuc;
                        }
                    ?>
                </div>
            </div>
        </div>