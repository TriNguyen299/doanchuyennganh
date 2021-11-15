<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>



<?php 
    class phim{

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_phim($data, $files)
        {
            #kết nốt database
            $phim_id = mysqli_real_escape_string($this->db->link, $data['phim_id']);
            $phim_name = mysqli_real_escape_string($this->db->link, $data['phim_name']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $quocgia = mysqli_real_escape_string($this->db->link, $data['quocgia']);
            $danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $link = mysqli_real_escape_string($this->db->link, $data['link']);
            $status = mysqli_real_escape_string($this->db->link, $data['status']);
            // Kiểm tra hình ảnh, lấy hình ảnh cho vào folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_img = "upload/".$unique_img;

           
            if($phim_id ==""|| $phim_name ==""|| $category ==""|| $quocgia ==""|| $danhmuc ==""
            || $description ==""|| $link ==""|| $status ==""|| $file_name =="") {
                $alert = "<span class='error'>Các trường nhập liệu không được để trống</span>";
                return $alert;
            } else {
                $query = "SELECT * FROM phim";
                $result = $this->db->select($query);

                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['phim_id'] == $phim_id){
                        $alert = "<span class='error'>Đã có phim này</span>";
                        return $alert;
                    }
                }
                #----------------------------------------
                move_uploaded_file($file_temp, $uploaded_img);
                $query_1 = "INSERT INTO phim(phim_id, phim_name, description, link, img, status, qg_id, cat_id, dm_id) 
                VALUES('$phim_id', '$phim_name', '$description', '$link', '$unique_img', '$status', '$quocgia', '$category', '$danhmuc')";
                $result_1 = $this->db->insert($query_1);

                if($result_1) {
                    $alert = "<span class='success'>Thêm Phim thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm Phim không thành công</span>";
                    return $alert;
                }
            }
           
        }

        public function show_phim()
        {
            // $query = "SELECT * FROM book order by book_id desc";
            $query = "SELECT phim.*, quocgia.qg_name, category.cat_name, danhmuc.dm_name 
            FROM phim  INNER JOIN quocgia ON phim.qg_id = quocgia.qg_id
            INNER JOIN category ON phim.cat_id = category.cat_id
            INNER JOIN danhmuc ON phim.dm_id = danhmuc.dm_id
            ORDER BY phim.phim_id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_phim($data, $files, $id)
        {
             #kết nốt database
             $phim_name = mysqli_real_escape_string($this->db->link, $data['phim_name']);
             $category = mysqli_real_escape_string($this->db->link, $data['category']);
             $quocgia = mysqli_real_escape_string($this->db->link, $data['quocgia']);
             $danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
             $description = mysqli_real_escape_string($this->db->link, $data['description']);
             $link = mysqli_real_escape_string($this->db->link, $data['link']);
             $status = mysqli_real_escape_string($this->db->link, $data['status']);
             // Kiểm tra hình ảnh, lấy hình ảnh cho vào folder upload
             $permited = array('jpg','jpeg','png','gif');
             $file_name = $_FILES['img']['name'];
             $file_size = $_FILES['img']['size'];
             $file_temp = $_FILES['img']['tmp_name'];
 
             $div = explode('.', $file_name);
             $file_ext = strtolower(end($div));
             $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
             $uploaded_img = "upload/".$unique_img;

             if($phim_name ==""|| $category ==""|| $quocgia ==""|| $danhmuc ==""
             || $description ==""|| $link ==""|| $status =="") {
                $alert = "<span class='error'>Các trường nhập liệu không được để trống</span>";
                return $alert;
            } else { 
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh mới
                    if($file_size > 204800) {
                        $alert = "<span class='error'> Dung lượng hình ảnh chỉ được nhỏ hơn 2 MB</span>";
                        return $alert;
                    } else if(in_array($file_ext, $permited) === false) {
                        $alert = "<span class='error'>Chỉ có thể upload các file có đuôi:-".implode(', ',$permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $uploaded_img);
                    $query = "UPDATE phim SET 
                    phim_name = '$phim_name', 
                    description = '$description', 
                    link = '$link' ,
                    img = '$unique_img', 
                    status = '$status' ,
                    qg_id = '$quocgia', 
                    cat_id = '$category' ,
                    dm_id = '$danhmuc'
                    WHERE phim_id = '$id'";
                } else {
                    // Nếu người dùng không chọn ảnh mới
                    $query = "UPDATE phim SET 
                    phim_name = '$phim_name', 
                    description = '$description', 
                    link = '$link' ,
                    status = '$status' ,
                    qg_id = '$quocgia', 
                    cat_id = '$category' ,
                    dm_id = '$danhmuc'
                    WHERE phim_id = '$id'";
                } 

                $result= $this->db->update($query);
                if($result) {
                    $alert = "<span class='success'>Sửa Phim thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Sửa Phim không thành công</span>";
                    return $alert;
                }
            }
        }

        public function del_phim($id)
        {

            $query = "DELETE FROM phim WHERE phim_id = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                $alert = "<span class='success'>Xóa Phim thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Xóa Phim không thành công</span>";
                return $alert;
            }
        }

        public function getphimbyId($id)
        {
            $query = "SELECT * FROM phim WHERE phim_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        /// END BACKEND

        /// START FONT-END
        public function getPhimwithStatus(){
            $query = "SELECT * FROM phim WHERE status = '1' LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function  getPhimNew(){
            $phim_1_trang = 4;
            if(!isset($_GET['trang'])) {
                $trang = 1;
            } else {
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang - 1)*$phim_1_trang;
            $query = "SELECT * FROM phim ORDER BY phim_id desc LIMIT $tung_trang,$phim_1_trang";
            $result = $this->db->select($query);
            return $result;
        }
     
        public function  getChitiet($id){
            $query = "SELECT phim.*, quocgia.qg_name, category.cat_name, danhmuc.dm_name  
            FROM phim  INNER JOIN quocgia ON phim.qg_id = quocgia.qg_id
            INNER JOIN category ON phim.cat_id = category.cat_id 
            INNER JOIN danhmuc ON phim.dm_id = danhmuc.dm_id
            WHERE phim.phim_id = '$id'";
            
            $result = $this->db->select($query);
            return $result;
        }
        public function  getXemphim($id){
            $query = "SELECT * FROM phim WHERE phim_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getPhimyt($user_id){
            $query = "SELECT * FROM phimyeuthich WHERE user_id = '$user_id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_phimyt($phim_id,$user_id)
        {
            #kết nốt database
            $phim_id = mysqli_real_escape_string($this->db->link, $phim_id);
            $user_id = mysqli_real_escape_string($this->db->link, $user_id);
            
            $query = "SELECT * FROM phim WHERE phim_id ='$phim_id'";
            $result = $this->db->select($query)->fetch_assoc();

            $phim_name = $result["phim_name"];
            $img = $result["img"];

            $query_insert="INSERT INTO phimyeuthich(phim_id,img,user_id,phim_name) VALUES('$phim_id','$img','$user_id','$phim_name')";
            $insert_phimyt = $this->db->insert($query_insert);
            
            if($insert_phimyt) {
                $alert = "<span class='success'>Thêm Phim yêu thích thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm Phim yêu thích không thành công</span>";
                return $alert;
            }
        }
        public function search_phim($tukhoa)
        {
            $tukhoa = $this->fm->validation($tukhoa);
            $query = "SELECT * FROM phim WHERE phim_name LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getPhimCungLoai($id_cungloai)
        {
            $id_cungloai = $this->fm->validation($id_cungloai);
            $query = "SELECT * FROM phim WHERE phim.cat_id='$id_cungloai' ORDER BY phim_id desc";

            
            $result = $this->db->select($query);
            return $result;
        }


    }
?>