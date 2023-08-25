<?php 
include_once '../llb/database.php';
include_once '../helper/format.php';
include_once '../llb/session.php';
session::logincheck();

class adminlogin{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }


    public function login_admin($data){
        $email= $this->valid->validation($data['email']);
        $Password= $this->valid->validation(md5($data['Password']));

        if(empty($email) || empty($Password)){
            $error='Fild must not be empty';
            return $error;
        }else{
            $query="SELECT * FROM user WHERE email='$email' && user_password='$Password'";
            $result=$this->db->select($query);
            if($result != false){
                $login_info=mysqli_fetch_assoc($result);
                if($login_info['v_status']==1){
                    session::set('login',true);
                    session::set('username',$login_info['user_name']);
                    session::set('userid',$login_info['user_id']);
                    header('location:index.php');

                }else{
                    $error='Please First Varifi Your Email';
                    return $error;
                }

            }else{
                $error='Invalid Email or Password!';
                return $error;
            }
        }




    }
}

?>