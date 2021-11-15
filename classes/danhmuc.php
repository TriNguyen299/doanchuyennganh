<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>



<?php 
    class danhmuc {

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_danhmuc($dm_id, $dm_name)
        {
            #kiểm tra nhập hợp lệ 
            $dm_id = $this->fm->validation($dm_id);
            $dm_name = $this->fm->validation($dm_name);
            #kết nốt database
            $dm_id = mysqli_real_escape_string($this->db->link, $dm_id);
            $dm_name = mysqli_real_escape_string($this->db->link, $dm_name);

           
            if(empty($dm_id) || empty($dm_name)) {
                $alert = "<span class='error'>ID Danh Mục và Tên Danh Mục không được để trống</span>";
                return $alert;
            } else {
                #----------------------------------------
                $query_1 = "INSERT INTO danhmuc(dm_id, dm_name) VALUES('$dm_id', '$dm_name')";
                $result_1 = $this->db->insert($query_1);

                if($result_1) {
                    $alert = "<span class='success'>Thêm Danh Mục thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm Danh Mục không thành công</span>";
                    return $alert;
                }
            }
           
        }

        public function show_danhmuc()
        {
            $query = "SELECT * FROM danhmuc order by dm_id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getdmbyId($dm_id)
        {
            $query = "SELECT * FROM danhmuc WHERE dm_id = '$dm_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_danhmuc($dm_name, $dm_id)
        {
            #kiểm tra nhập hợp lệ 
            $dm_id = $this->fm->validation($dm_id);
            $dm_name = $this->fm->validation($dm_name);
            #kết nốt database
            $dm_id = mysqli_real_escape_string($this->db->link, $dm_id);
            $dm_name = mysqli_real_escape_string($this->db->link, $dm_name);

           
            if(empty($dm_name)) {
                $alert = "<span class='error'>Tên Danh Mục không được để trống</span>";
                return $alert;
            } else {               
                $query = "UPDATE danhmuc SET dm_name = '$dm_name' WHERE dm_id = '$dm_id'";
                $result= $this->db->update($query);

                if($result) {
                    $alert = "<span class='success'>Sửa Danh Mục thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Sửa Danh Mục không thành công</span>";
                    return $alert;
                }
            }
        }

        public function del_danhmuc($del_id)
        {
            $query = "DELETE FROM danhmuc WHERE dm_id = '$del_id'";
            $result = $this->db->delete($query);
            if($result) {
                $alert = "<span class='success'>Xóa Danh Mục thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Xóa Danh Mục không thành công</span>";
                return $alert;
            }
        }
        public function show_danhmuc_fontend()
        {
            $query = "SELECT * FROM danhmuc order by dm_id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_dm_name($id)
        {
            $query = "SELECT dm_name FROM danhmuc WHERE dm_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_phim_by_dm($id)
        {
            $query = "SELECT * FROM phim WHERE dm_id = '$id' order by dm_id desc LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>