<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../llb/database.php');
include_once ($filepath.'/../helper/format.php');
class tag{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

   public function add_tag($data){
    $tag_name= $this->valid->validation($data['tag_name']);
    $tag_status= $this->valid->validation($data['tag_status']);

    if(!empty($tag_name) && !empty($tag_status)){
        $check_tag="SELECT * FROM tag WHERE tag_name='$tag_name' ";
        $run_check_tag= $this->db->select($check_tag);
        if($run_check_tag==true){
            $error='This Tag Name Already Used';
            return $error;

        }else{
            $add_tag_query="INSERT INTO `tag`( `tag_name`, `tag_status`) VALUES ('$tag_name',$tag_status)";
            $run_add_tag_query=$this->db->insert($add_tag_query);
            if($run_add_tag_query==true){
                $success='Tag Added Successfully';
                return $success;

            }else{
                $error='Tag Added Failed';
                return $error;
            }
        }

    }else{
        $error='Fild must not be empty';
        return $error;
    }

   }

   public function manage_tag(){
    $select_tag="SELECT * FROM tag";
    $run_check_tag= $this->db->select($select_tag);
    if($run_check_tag==true){
        $tag_data = $run_check_tag;
        return $tag_data;
    }
  }

}


?>