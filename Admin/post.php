        <!-- ====================================== -->
          <?php include_once 'include/header.php';?>
        <!-- ======================================= -->
         <!-- ========== Left Sidebar Start ========== -->
         <?php include_once 'include/left_side_bar.php';?>
         <!------------- Left Sidebar End -------------->
        <?php 
        require '../llb/database.php';
        $db=new database();
        require '../classes/post_class.php';
        $post_manage=new post();
        $post_info=$post_manage->manage_post();

        function truncate(string $text, int $length = 2000): string {
          if (strlen($text) <= $length) {
              return $text;
          }
          $text = substr($text, 0, $length);
          $text = substr($text, 0, strrpos($text, " "));
          $text .= "...";
          return $text;
      }

        ?>

                      
         <div class="main-content">
             <div class="page-content">
              <div class="container-fluid">

              <a class="btn btn-lg btn-outline-success" href="add_post.php" role="button">Add New Post</a>
              <div class="mt-3 row justify-content-center">
                <div class="col-sm-12" >
                <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Category Name</th>
                            <th>Subcatagory Name</th>
                            <th>Post_disc1</th>
                            <th>Thambnail</th>
                            <th>Summery</th>
                            <th>image</th>
                            <th>Post type</th>
                            <th>Post status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i=1; 
                          while($post_info_row=mysqli_fetch_assoc($post_info)){
                          $cat_id=$post_info_row['cat_id'];
                          $cat_query="SELECT * FROM category WHERE cat_id='$cat_id' ";
                          $run_query=$db->select($cat_query);
                          if(mysqli_num_rows($run_query)>0){
                            $cat_data=mysqli_fetch_assoc($run_query);
                          }

                          $subcat_id=$post_info_row['sub_cat_id'];
                          $subcat_query="SELECT * FROM subcategory WHERE sub_cat_id='$subcat_id' ";
                          $run_sub_query=$db->select($subcat_query);
                          if(mysqli_num_rows($run_sub_query)>0){
                            $data=mysqli_fetch_assoc($run_sub_query);
                          }
                          ?>
                          <tr>
                          <td><?=$i++;?></td>
                          <td><?=$post_info_row['post_title'];?></td>
                          <td><?= $cat_data['cat_name'];?> </td>
                          <td><?=$data['sub_cat_name'];?></td>
                          <td>
                            <?php echo truncate($post_info_row['post_discription'],50);?>
                          </td>
                          <td><img style="width: 100px;"src="image/<?php echo $post_info_row['thumbnail_img'];?>" alt=""></td>                          
                          <td>
                            <?php echo truncate($post_info_row['post_summery'],30);?>
                          </td>
                          <td><img style="width: 100px;" src="image/<?php echo $post_info_row['img_2'];?>" alt=""></td>                          
                          <td>
                            <?php
                              if($post_info_row['post_type'] == 1){
                                echo 'Banner';
                                }else{
                                  echo 'Post';
                                }                            
                            ?>
                          </td>
                          <td>
                            <?php 
                              if($post_info_row['post_status'] == 1){
                                echo 'Published';
                                }else{
                                echo 'Unpublished';
                                }
                            ?>
                          </td>
                          <td>
                           <a class="btn btn-outline-success my-2"  href=""><i class="fas fa-edit"></i></a>
                           <a class="btn btn-outline-danger my-2" href=""><i class="fa fa-trash" ></i></a>
                           <a class="btn btn-outline-success my-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $post_info_row['post_id'];?>" href=""><i class="fa fa-eye" ></i></a>
                           <a class="btn btn-outline-primary my-2"  href=""><i class="fa fa-arrow-up"></i></a>

                          </td>
                          </tr>
                          <?php }?>
                        </tbody>
                 </table>
                </div>
              </div>
                 

              </div>
             </div>
         </div>


 <?php 
  $post_modal_data=$post_manage->post_modal();
   if($post_modal_data != false){
   while($post_modal_row=mysqli_fetch_assoc($post_modal_data)){ ?>

  <!-- Modal -->
    <div class="modal fade" id="staticBackdrop-<?php echo $post_modal_row['post_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Quick View</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered" >
              <tr>
                <td><label for="title">Title</label></td>
                <td><?php echo $post_modal_row['post_title']?></td>
              </tr>
              <tr>
                <td><label for="Category">Category Name</label></td>
                <td><?php echo $post_modal_row['cat_name']?></td>
              </tr>
              <tr>
                <td><label for="subcategory">Subcategory Name</label></td>
                <td><?php echo $post_modal_row['sub_cat_name']?></td>
              </tr>
              <tr>
                <td><label for="discription_1">Discription_1</label></td>
                <td><?php echo $post_modal_row['post_discription']?></td>
              </tr>
              <tr>
                <td><label for="thumbnail">Thumbnail_image</label></td>
                <td><img style="width: 350px;" src="image/<?php echo $post_modal_row['thumbnail_img'];?>" alt=""></td>
              </tr>
              <tr>
                <td><label for="summery">Post Summery</label></td>
                <td><?php echo $post_modal_row['post_summery']?></td>
              </tr>
              
              <tr>
                <td><label for="Image_2">Image_2</label></td>
                <td><img style="width: 350px;" src="image/<?php echo $post_modal_row['img_2'];?>" alt=""></td>
              </tr>
              <tr>
                <td><label for="Create">Create At</label></td>
                <td><?php echo $post_modal_row['creat_at']?></td>
              </tr>
              <tr>
                <td><label for="Update">Update At</label></td>
                <td><?php echo $post_modal_row['update_at']?></td>
              </tr>
              <tr>
              <td><label for="post_type">Post Type</label></td>
                <td>
                    <?php 
                    if($post_modal_row['post_type'] == 1){
                    echo 'Banner';
                    }else{
                      echo 'Post';
                    }
                    ?>
                  </td>
              </tr>
              <tr>
              <td><label for="post_status">Post Status</label></td>
                <td>
                  <?php 
                    if($post_modal_row['post_status'] == 1){
                      echo 'Published';
                      }else{
                      echo 'Unpublished';
                      }?>
                </td>
            </tr>
            </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


<?php
 }
}
?>



        <!-- ============================================================== -->
       <?php include_once 'include/footer.php';?>
       <!-- ============================================================== -->