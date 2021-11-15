<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include ($filepath.'/../lib/session.php');
    Session::checkLogin();
    include ($filepath.'/../lib/database.php');
    include ($filepath.'/../helpers/format.php');
?>



<?php 


    class adminlogin {

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin ($username, $password){
            #kiểm tra nhập hợp lệ 
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);
            #kết nốt database
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if(empty($username) || empty($password)) {
                $alert = "<span class='warning'>Tài khoản và Mật khẩu không được để trống</span>";
                return $alert;
            } else {
                $query = "SELECT * FROM admin WHERE username = '$username' and password = '$password' LIMIT 1";
                $result = $this->db->select($query);

                if ($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('username',$value['username']);
                    Session::set('password',$value['password']);
                    Session::set('name',$value['name']);
                    Session::set('email',$value['email']);
                    Session::set('phone',$value['phone']);
                    header('Location:index.php'); 
                    #Đúng thì hướng tới index
                } else {
                    $alert = "Tài khoản và Mật khẩu không đúng";
                    return $alert;
                }
            }
           
        }

    }
?>