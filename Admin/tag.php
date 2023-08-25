          <!-- ============================================================== -->
          <?php include_once 'include/header.php';?>
          <!-- ============================================================== -->
          
         <!-- ========== Left Sidebar Start ========== -->
         <?php include_once 'include/left_side_bar.php';?>
         <!------------- Left Sidebar End -------------->

            <?php  
            include_once '../classes/tag_class.php';
            $add_tag= new tag();
            $tag_info=$add_tag->manage_tag();


            if(isset($_POST['tag_submit'])){
                $tag_msg=$add_tag->add_tag($_POST);
            }


            // if(isset($_GET["status"])){
            //     if($_GET["status"]='delet'){
            //         $id=$_GET['id'];
            //         $delete_msg=$obj->delet_category($id);
            //     }
            //     }

            ?>

            <div class="main-content">
             <div class="page-content">
              <div class="container-fluid">
                <!--add category start---->
                <div class="container my-4 p-4 shadow">

                  <?php if(isset($tag_msg)){ ?>
                    <span>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $tag_msg; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                    </span>
                  <?php } ?>

                <h1 class="text-center">Add Tag</h1>
                <form action="" method="POST" >
                <div class="mb-3">
                <label for="cat_name" class="form-label fs-4">Tag Name</label>
                <input type="text" name="tag_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="sub_category_status" class="form-label">Tag Status</label>
                    <select name="tag_status" class="form-control" id="sub_category_status">
                    <option value="">Select Tag status</option>
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                    </select>
                </div>
                
                <input type="submit" value="Add Tag" name="tag_submit" class="form-control btn btn-primary" >
                </form>
                </div>

                <!--add category end---->

                <!--Manage category start---->
                <div class="container my-4 p-4 shadow">
                <h1 class="text-center">Manage Tag</h1>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Tag Name</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                        $serial_no=1;
                        while($tag_row=mysqli_fetch_assoc($tag_info)){ ?>
                            <tr>
                            <td><?php echo $serial_no++;?></td>
                            <td><?php echo $tag_row['tag_name']?></td>
                            <td>
                                <a class="btn btn-outline-success my-2"  href="">Edit</a>
                                <a class="btn btn-outline-danger my-2" href="">Delet</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>  
                    </div>
                
                <!--manage category end---->
            </div>
        </div>
    </div>

     <!-- ============================================================== -->
     <?php include_once 'include/footer.php';?>
     <!-- ============================================================== -->

         