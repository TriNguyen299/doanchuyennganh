<?php
    $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>



<?php 
    class user{

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_user($data)
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            
            
            if($email ==""|| $name ==""|| $password ==""|| $address ==""
            || $city ==""|| $country ==""|| $phone =="") {
                $alert = "<span class='error'>Các trường nhập liệu không được để trống</span>";
                return $alert;
            } else { 
                $check_email = "SELECT * FROM users WHERE email ='$email'";
                $result_check_email = $this->db->select($check_email);
                $check_phone = "SELECT * FROM users WHERE phone ='$phone'";
                $result_check_phone = $this->db->select($check_phone);

                if($result_check_email) {
                    $alert = "<span class='error'>Email này đã tồn tại tài khoản ! Làm ơn nhập Email khác</span>";
                    return $alert;
                } else if($result_check_phone){
                    $alert = "<span class='error'>Số Điện Thoại này đã tồn tại tài khoản ! Làm ơn nhập Số Điện Thoại khác</span>";
                    return $alert;
                } else {
                    $query = "INSERT INTO users(email, password, name, address, phone, city, country) 
                     VALUES('$email', '$password', '$name', '$address', '$phone', '$city', '$country')";
                    $result = $this->db->insert($query);
                    if($result) {
                        $alert = "<span class='success'>Tài khoản đã được tạo</span>";
                        return $alert;
                    } else {
                        $alert = "<span class='error'>Tài khoản chưa được tạo</span>";
                        return $alert;
                    }
                }

            }

        }

        public function login_user($data) 
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($email ==''|| $password =='') {
                $alert = "<span class='error'>Email và Password không được để trống</span>";
                return $alert;
            } else { 
                $check_email_pass = "SELECT * FROM users WHERE email ='$email' AND password ='$password'";
                $result_check_email_pass = $this->db->select($check_email_pass);
                if($result_check_email_pass != false) {
                    $value = $result_check_email_pass->fetch_assoc();
                    Session::set('user_login', true);
                    Session::set('user_id', $value['id']);
                    Session::set('user_name', $value['name']);
                    header('Location:dangnhap2.php');
                } else {
                    $alert = "<span class='error'>Email hoặc Password không trùng khớp</span>";
                    return $alert;
                }

            }
        }

        public function show_User($id)
        {
            $query = "SELECT * FROM users WHERE id ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_user($data, $id)
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            
            
            if($email ==""|| $name ==""|| $address ==""
            || $city ==""|| $country ==""|| $phone =="") {
                $alert = "<span class='error'>Các trường nhập liệu không được để trống</span>";
                return $alert;
            } else { 
                $check_email = "SELECT * FROM users WHERE email ='$email'";
                $result_check_email = $this->db->select($check_email);
                $check_phone = "SELECT * FROM users WHERE phone ='$phone'";
                $result_check_phone = $this->db->select($check_phone);

                
                    $query = "UPDATE  users SET email='$email', name='$name', address='$address', phone='$phone', 
                    city='$city', country='$country' WHERE id ='$id'";
                    $result = $this->db->update($query);
                    if($result) {
                        $alert = "<span class='success'>Sửa thông tin tài khoản thành công</span>";
                        return $alert;
                    } else {
                        $alert = "<span class='error'>Sửa thông tin tài khoản không thành công</span>";
                        return $alert;
                    }
                

            }
        }
       

    }
?>