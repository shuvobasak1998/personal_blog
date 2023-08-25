<?php 
include_once '../llb/database.php';
include_once '../helper/format.php';

class subcategory{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

   public function add_sub_cat($data){
    $catagory_id= $this->valid->validation($data['catagory']);
    $sub_category_name= $this->valid->validation($data['sub_category_name']);
    $sub_category_status= $this->valid->validation($data['sub_category_status']);

    if(!empty($catagory_id) && !empty($sub_category_name) && !empty($sub_category_status)){
        $check_sub_category="SELECT * FROM subcategory WHERE sub_cat_name='$sub_category_name' ";
        $run_check_sub_category= $this->db->select($check_sub_category);
        if($run_check_sub_category==true){
            $error='This SubCategory Name Already Used';
            return $error;

        }else{
            $add_subcat_query="INSERT INTO subcategory (sub_cat_name,cat_id,sub_cat_status,create_at,update_at) VALUES ('$sub_category_name',$catagory_id,$sub_category_status,now(),now() )";
            $run_add_subcat_query=$this->db->insert($add_subcat_query);
            if($run_add_subcat_query==true){
                $success='SubCategory Added Successfully';
                return $success;

            }else{
                $error='SubCategory Added Failed';
                return $error;
            }
        }

    }else{
        $error='Fild must not be empty';
        return $error;
    }

 }

 public function manage_sub_cat(){
    $select_subcategory="SELECT s.*,c.cat_name
    FROM subcategory AS s INNER JOIN category AS c
    ON s.cat_id = c.cat_id ";
    $run_check_subcategory= $this->db->select($select_subcategory);
    if($run_check_subcategory==true){
        $subcat_data = $run_check_subcategory;
        return $subcat_data;
    }
 }

 public function delet_sub_category($id){
    $del_sub_query="DELETE FROM subcategory WHERE sub_cat_id=$id";
    $run_del_sub_query=$this->db->delate($del_sub_query);
    if($run_del_sub_query != false){
        $del_info='Subcategory Deleted Successfully';
        return $del_info;
    }

}

 




}

?>