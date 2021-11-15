<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/danhmuc.php';?>
<?php 
    $dm = new danhmuc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dm_id = $_POST['dm_id'];
        $dm_name = $_POST['dm_name'];

        $insertDanhmuc = $dm->insert_danhmuc($dm_id, $dm_name);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Quốc Gia Sản Xuất</h2>
                
               <div class="block copyblock"> 
                 <form action="danhmucadd.php" method="post">
                    <table class="form" >
                        <tr>
                            <td>
                                <input type="text" name="dm_id" placeholder="Thêm Mã Danh Mục ..." class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="text" name="dm_name" placeholder="Thêm Tên Danh Mục..." class="medium" />
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
                    if(isset($insertDanhmuc)){
                        echo $insertDanhmuc;
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>