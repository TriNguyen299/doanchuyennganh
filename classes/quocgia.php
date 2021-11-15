<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>



<?php 
    class quocgia {

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_quocgia($qg_id, $qg_name)
        {
            #kiểm tra nhập hợp lệ 
            $qg_id = $this->fm->validation($qg_id);
            $qg_name = $this->fm->validation($qg_name);
            #kết nốt database
            $qg_id = mysqli_real_escape_string($this->db->link, $qg_id);
            $qg_name = mysqli_real_escape_string($this->db->link, $qg_name);

           
            if(empty($qg_id) || empty($qg_name)) {
                $alert = "<span class='error'>ID Quốc Gia Sản Xuất và Tên Quốc Gia Sản Xuất không được để trống</span>";
                return $alert;
            } else {
                #----------------------------------------
                $query_1 = "INSERT INTO quocgia(qg_id, qg_name) VALUES('$qg_id', '$qg_name')";
                $result_1 = $this->db->insert($query_1);

                if($result_1) {
                    $alert = "<span class='success'>Thêm Quốc Gia Sản Xuất thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm Quốc Gia Sản Xuất không thành công</span>";
                    return $alert;
                }
            }
           
        }

        public function show_quocgia()
        {
            $query = "SELECT * FROM quocgia order by qg_id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getqgbyId($qg_id)
        {
            $query = "SELECT * FROM quocgia WHERE qg_id = '$qg_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quocgia($qg_name, $qg_id)
        {
            #kiểm tra nhập hợp lệ 
            $qg_id = $this->fm->validation($qg_id);
            $qg_name = $this->fm->validation($qg_name);
            #kết nốt database
            $qg_id = mysqli_real_escape_string($this->db->link, $qg_id);
            $qg_name = mysqli_real_escape_string($this->db->link, $qg_name);

           
            if(empty($qg_name)) {
                $alert = "<span class='error'>Tên Quốc Gia Sản Xuất không được để trống</span>";
                return $alert;
            } else {               
                $query = "UPDATE quocgia SET qg_name = '$qg_name' WHERE qg_id = '$qg_id'";
                $result= $this->db->update($query);

                if($result) {
                    $alert = "<span class='success'>Sửa Quốc Gia Sản Xuất thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Sửa Quốc Gia Sản Xuất không thành công</span>";
                    return $alert;
                }
            }
        }

        public function del_quocgia($del_id)
        {
            $query = "DELETE FROM quocgia WHERE qg_id = '$del_id'";
            $result = $this->db->delete($query);
            if($result) {
                $alert = "<span class='success'>Xóa Quốc Gia Sản Xuất thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Xóa Quốc Gia Sản Xuất không thành công</span>";
                return $alert;
            }
        }
        public function show_quocgia_fontend()
        {
            $query = "SELECT * FROM quocgia order by qg_id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_qg_name($id)
        {
            $query = "SELECT qg_name FROM quocgia WHERE qg_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_phim_by_qg($id)
        {
            $query = "SELECT * FROM phim WHERE qg_id = '$id' order by qg_id desc LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

      

    }
?>