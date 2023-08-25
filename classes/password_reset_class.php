<?php 
include_once '../llb/database.php';
include_once '../helper/format.php';
class password_reset{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

    public function reset_pass($data){
        $email= $this->valid->validation($data['email']);
        $Password=$this->valid->validation(md5($data['Password']));
        $C_Password= $this->valid->validation(md5($data['C_Password']));
        $v_token= $this->valid->validation($data['token']);


        if(empty($email)||empty($Password)||empty($C_Password)||empty($v_token)){
            $error='Fild must not be empty';
            return $error;
        }else{
            if(isset($v_token)){
                $check_token_query="SELECT v_token FROM user WHERE v_token='$v_token'";
                $run_query=$this->db->select($check_token_query);

                if($run_query != false){
                    $row=mysqli_fetch_assoc($run_query);
                    $token=$row['v_token'];

                    if( $Password == $C_Password ){
                        $update_query="UPDATE user SET user_password ='$C_Password' WHERE v_token='$token' ";
                        $run_update_query= $this->db->update($update_query);

                        if($run_update_query != false){
                            $up_token=md5(rand());
                            $update_token="UPDATE user SET v_token ='$up_token' WHERE v_token='$token'";
                            $run_update_token=$this->db->update($update_token);

                            $success='Password Updated Successfully';
                            return $success;

                        }else{
                            $error='Password Reset Failed';
                            return $error;
                        }

                    }else{
                        $error='Password Does Not Match';
                        return $error; 
                    }

                }else{
                    $error='Token Does Not Match';
                    return $error;
                }

            }else{
                $error='Token Does Not Exist';
                return $error;
            }

        }

    }

}

?>