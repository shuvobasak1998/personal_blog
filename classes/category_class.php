<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../llb/database.php');
include_once ($filepath.'/../helper/format.php');
class category{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

   public function add_cat($data){
      $cat_name= $this->valid->validation($data['cat_name']);

        if(!empty($cat_name)){
            $check_category="SELECT * FROM category WHERE cat_name='$cat_name' ";
            $run_check_category= $this->db->select($check_category);
            if($run_check_category==true){
                $error='This Category Name Already Used';
                return $error;

            }else{
                $add_cat_query="INSERT INTO category (cat_name) VALUES ('$cat_name')";
                $run_add_cat_query=$this->db->insert($add_cat_query);
                if($run_add_cat_query==true){
                    $success='Category Added Successfully';
                    return $success;

                }else{
                    $error='Category Added Failed';
                    return $error;
                }

            }
            

        }else{
            $error='Fild must not be empty';
            return $error;
        }
    }

    public function manage_cat(){
        $select_category="SELECT * FROM category";
        $run_check_category= $this->db->select($select_category);
        if($run_check_category==true){
            $cat_data = $run_check_category;
            return $cat_data;
        }
    }

    public function delet_category($id){
        $del_query="DELETE FROM category WHERE cat_id=$id";
        $run_del_query=$this->db->delate($del_query);
        if($run_del_query != false){
            $del_info='Category Deleted Successfully';
            return $del_info;
        }

    }

   
}

?>