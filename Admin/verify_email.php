<?php  
session_start();
include_once '../llb/database.php';
$db=new database();

if(isset($_GET['token'])){
  $token=$_GET['token'];

  $select_query="SELECT * FROM user WHERE v_token='$token'";
  $result=$db->select($select_query);

  if(isset($result)){
    $row=mysqli_fetch_assoc($result);
    if($row['v_status']==0){
      $click_token=$row['v_token'];
      $update_query="UPDATE user SET v_status ='1' WHERE v_token='$click_token' ";
      $update_result=$db->update($update_query);
      if(isset($update_result)){
        $_SESSION['status']='Your Email Has Been Varified Successfully Please Login';
        header('location:login.php');

      }else{
        $_SESSION['status']='Varification Filed!';
        header('location:login.php');
      }

    }else{
      $_SESSION['status']='This Email Is Already Varified Please Login';
      header('location:login.php');
    }

  }else{
    $_SESSION['status']='This Token Does Not Exist!';
    header('location:login.php');
  }


}else{
  $_SESSION['status']='Not Allowed';
  header('location:login.php');
}
?>