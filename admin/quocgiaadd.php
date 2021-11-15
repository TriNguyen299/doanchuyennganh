<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/quocgia.php';?>
<?php 
    $qg = new quocgia();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $qg_id = $_POST['qg_id'];
        $qg_name = $_POST['qg_name'];

        $insertQuocgia = $qg->insert_quocgia($qg_id, $qg_name);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Quốc Gia Sản Xuất</h2>
                
               <div class="block copyblock"> 
                 <form action="quocgiaadd.php" method="post">
                    <table class="form" >
                        <tr>
                            <td>
                                <input type="text" name="qg_id" placeholder="Thêm Mã Quốc Gia Sản Xuất ..." class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="text" name="qg_name" placeholder="Thêm Tên Quốc Gia Sản Xuất..." class="medium" />
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
                    if(isset($insertQuocgia)){
                        echo $insertQuocgia;
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>