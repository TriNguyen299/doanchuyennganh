<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/quocgia.php';?>
<?php 
    $qg = new quocgia();
    if (!isset($_GET['qg_id']) || $_GET['qg_id'] == NULL) {
        echo "<script>window.location = 'quocgialist.php'</script>";
    } else {
        $qg_id = $_GET['qg_id'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $qg_name = $_POST['qg_name'];

        $updateQuocgia = $qg->update_quocgia($qg_name, $qg_id);
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Quốc Gia Sản Xuất</h2>
                
               <div class="block copyblock"> 
                    <?php 
                        $get_qg_name = $qg->getqgbyId($qg_id);
                        if($get_qg_name) {
                            while($result = $get_qg_name->fetch_assoc()){

                            
                    ?>
                    <form action="" method="post">
                        <table class="form" >
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['qg_id']?>" name="qg_id" placeholder="Nhập Mã Quốc Gia..." class="medium" disabled/>
                                </td>
                            </tr>					
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['qg_name']?>" name="qg_name" placeholder="Nhập Tên Quốc Gia..." class="medium" />
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
                        if(isset($updateQuocgia)){
                            echo $updateQuocgia;
                        }
                    ?>
                </div>
            </div>
        </div>