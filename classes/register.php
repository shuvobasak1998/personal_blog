<?php 
include_once '../llb/database.php';
include_once '../helper/format.php';
include_once '../Admin/registration.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class register{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }
   public function adduser($data){
       
    function sendemail_varifi($name,$email,$v_token){
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
    <a href='http://localhost/personal_blog/admin/verify_email.php?token=$v_token'>Click Here</a>
    ";


    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $email_template;

    $mail->send();
    echo 'Message has been sent';
 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }


    }


    $name= $this->valid->validation($data['name']);
    $phone= $this->valid->validation($data['phone']);
    $email= $this->valid->validation($data['email']);
    $Password= $this->valid->validation(md5($data['Password']));
    $v_token=md5(rand());


    if(empty($name)||empty($phone)||empty($email)||empty($Password)||empty($v_token)){
        $error='Fild must not be empty';
        return $error;
    }else{
        $email_query= "SELECT * FROM user WHERE email='$email'";
            $check_email= $this->db->select($email_query);
            if($check_email){
                $error='This Email Is Already Used';
                return $error;
            }else{
                $adduser_query="INSERT INTO user(user_name,email,phone,user_password,v_token)VALUES('$name','$email','$phone','$Password','$v_token')";
                $adduser_info=$this->db->insert($adduser_query);

                if(isset($adduser_info)){
                    sendemail_varifi($name, $email,$v_token);
                    $success='Registration Successfull.please check your email inbox for varifi email';
                    return $success;
                }else{
                    $error='Registration is failed';
                    return $error;
                }
            }

        }

}

}



?>