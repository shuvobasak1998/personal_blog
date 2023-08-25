<?php 
class session{
  public static function init(){
	session_start();
  }

  public static function set($key,$value){
	$_SESSION[$key]=$value;
  }
  

  public static function get($key){
	if(isset($_SESSION[$key])){
		return $_SESSION[$key];
	}else{
		return false;
	}

  }

  public static function logincheck(){
	self::init();
	if(self::get('login')==true){
		header('location:index.php');

	}
  }

  public static function sessioncheck(){
	self::init();
	if(self::get('login')==false){
		self::distroy();

	}
  }

  public static function distroy(){
	session_destroy();
	header('location:login.php');
  }


}




?>