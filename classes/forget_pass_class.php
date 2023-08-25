<?php 
include_once '../llb/database.php';
include_once '../helper/format.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class password_reset{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

   public function reset_pass($data){

     function password_reset_link($name,$email,$token){
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

 try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'shuvobasak01752@gmail.com';                     //SMTP username
    $mail->Password   = 'gvlgheejlpqlfaei';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('shuvobasak01752@gmail.com', 'Mailer');
    $mail->addAddress($email, $name);     //Add a recipient
    
    //Content
    $email_template="
    <h2>You have register with personal blog website</h2>
    <h5>Verify your email address to login please click the link below</h5>
    <a href='http://localhost/personal_blog/admin/password_reset.php?token=$token&&email=$email'>Click Here</a> ";


    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $email_template;

    $mail->send();
    echo 'Message has been sent';
 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }

    }


    $email= $this->valid->validation($data['email']);
    $token=md5(rand());

    if(empty($email)){
        $error='Fild Must Not Be Empty';
        return $error;
    }else{
        $check_email="SELECT * FROM user WHERE email='$email'";
        $result= $this->db->select($check_email);

        if($result != false){
            $row=mysqli_fetch_assoc($result);
            $name= $row['user_name'];
            $email=$row['email'];

            $update_token="UPDATE user SET v_token = '$token' WHERE email='$email'";
            $update_res=$this->db->update($update_token);

             

            if($update_res){
                password_reset_link($name,$email,$token);
                $success='Password Reset Link Has Been Sent Your Email';
                return $success;

            }else{
                $error='Token Does Not Updated';
                return $error; 
            }

        }else{
            $error='Email Does Not Match';
            return $error;
        }
    }


   }

}


?>