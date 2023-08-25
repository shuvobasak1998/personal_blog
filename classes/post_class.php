<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../llb/database.php');
include_once ($filepath.'/../helper/format.php');
class post{
    public $db;
    public $valid;

   public function __construct(){
    $this->db= new database();
    $this->valid= new format();
   }

   public function add_post($data){
    $userId=$this->valid->validation($data['userId']);
    $post_title= $this->valid->validation($data['post_title']);
    $post_catagory= $this->valid->validation($data['post_catagory']);
    $post_sub_catagory= $this->valid->validation($data['post_sub_catagory']);
    $post_disc= $this->valid->validation($data['post_disc']);
    $post_summery= $this->valid->validation($data['post_summery']);
    $post_type= $this->valid->validation($data['post_type']);
    $post_status= $this->valid->validation($data['post_status']);

    if (isset($data['post_tag']) && is_array($data['post_tag'])) {
        $selected_tag = $data['post_tag'];
    } else {
        $selected_tag = array(); // If no tags were selected, set an empty array
    }

    $post_img_1=$_FILES['post_img_1']['name'];
    $post_img_1_size=$_FILES['post_img_1']['size'];
    $post_img_1_tmp=$_FILES['post_img_1']['tmp_name'];


    $post_img_2=$_FILES['post_img_2']['name'];
    $post_img_2_size=$_FILES['post_img_2']['size'];
    $post_img_2_tmp=$_FILES['post_img_2']['tmp_name'];    



    if(empty($post_title)||empty($post_catagory)||empty($post_sub_catagory)||empty($post_disc)||
    empty($post_summery)||empty($post_type)||empty($post_status)||empty($post_img_1)){
        $error='Fild must not be empty';
        return $error;
    }elseif($post_img_1_size>1048567){
        $msg='File Size Must Be Less Than 1 MB';
        return  $msg;
    }elseif($post_img_2_size>1048567){
        $msg='File Size Must Be Less Than 1 MB';
        return  $msg;
    }else{
        
            if (move_uploaded_file($post_img_1_tmp,'../Admin/image/'.$post_img_1) && move_uploaded_file($post_img_2_tmp,'../Admin/image/'.$post_img_2)) {
                $conn = mysqli_connect('localhost', 'root', '', 'personal_blog');
                if (!$conn) {
                    die("database connection error!!");
                }
                // Prepare the SQL statement using a prepared statement
                $insertquery = "INSERT INTO `post`(`user_id`, `post_title`, `cat_id`, `sub_cat_id`, `post_discription`, `thumbnail_img`, `post_summery`, `img_2`, `post_type`, `post_status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $query_run = mysqli_prepare($conn, $insertquery);
        
                // Bind the parameters
                mysqli_stmt_bind_param($query_run, "isiissssii", $userId, $post_title, $post_catagory, $post_sub_catagory, $post_disc, $post_img_1, $post_summery, $post_img_2, $post_type, $post_status);
        
                // Execute the prepared statement
                if (mysqli_stmt_execute($query_run)) {
                    $post_id = mysqli_insert_id($conn);
        
                    if (!empty($selected_tag)) {
                        $insert_tag_query = "INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)";
                        $insert_tag_stmt = mysqli_prepare($conn, $insert_tag_query);
        
                        foreach ($selected_tag as $tag_id) {
                            mysqli_stmt_bind_param($insert_tag_stmt, "ii", $post_id, $tag_id);
                            mysqli_stmt_execute($insert_tag_stmt);
                        }
                        
                        // Check if tags were inserted successfully
                        if (mysqli_affected_rows($conn) > 0) {
                            return 'Post Added Successfully';
                        } else {
                            return 'Post Added Failed';
                        }
                    } else {
                        return 'Post Added Successfully';
                    }
                } else {
                    return 'Post Added Failed';
                }
            }
        }
        
   }
  
   

   public function manage_post(){
    $select_post="SELECT * FROM post";
    $run_check_post= $this->db->select($select_post);
    if($run_check_post != false){
        $post_data = $run_check_post;
        return $post_data;
    }
  }

  public function post_modal(){
    $select_modal_data="SELECT p.*,c.cat_name,s.sub_cat_name
    FROM post AS p INNER JOIN category AS c
    ON p.cat_id = c.cat_id
    LEFT JOIN subcategory AS s
    ON c.cat_id = s.cat_id
    ORDER BY
    c.cat_id,s.sub_cat_id,p.post_id";
    $run_check_modal_post= $this->db->select($select_modal_data);
    if($run_check_modal_post==true){
        $modal_data = $run_check_modal_post;
        return $modal_data;
    }
  }

  public function recent_post(){
    $select_post="SELECT * FROM post ORDER BY post_id DESC";
    $run_check_post= $this->db->select($select_post);
    if($run_check_post != false){
        $post_data = $run_check_post;
        return $post_data;
    }
  }

  public function post_summery(){
    $select_post="SELECT p.*,u.user_name
    FROM post AS p INNER JOIN user AS u
    ON p.user_id = u.user_id
    ORDER BY post_id DESC";
    $run_check_post= $this->db->select($select_post);
    if($run_check_post != false){
        $post_data = $run_check_post;
        return $post_data;
    }
  }

  public function single_post($id){
    $select_single_post="SELECT DISTINCT
    p.* ,
    u.`user_name`,
    c.`cat_name`,
    pt.`tag_id`,
    t.`tag_name`,
    t.`tag_id`
FROM
    `post` p
LEFT JOIN
    `user` u ON p.`user_id` = u.`user_id`
LEFT JOIN
    `category` c ON p.`cat_id` = c.`cat_id`
LEFT JOIN
    `post_tag` pt ON p.`post_id` = pt.`post_id`
LEFT JOIN
    `tag` t ON pt.`tag_id` = t.`tag_id`
    WHERE   p.post_id = '$id' ";
    $run_check_single_post= $this->db->select($select_single_post);
    if($run_check_single_post != false){
        $post_data = $run_check_single_post;
        return $post_data;
    }
  }

 



}

  
  








?>