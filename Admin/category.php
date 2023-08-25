          <!-- ============================================================== -->
          <?php include_once 'include/header.php';?>
          <!-- ============================================================== -->
          
         <!-- ========== Left Sidebar Start ========== -->
         <?php include_once 'include/left_side_bar.php';?>
         <!------------- Left Sidebar End -------------->

            <?php  
            include_once '../classes/category_class.php';
            $add_cat= new category();

            $cat_info=$add_cat->manage_cat();

            if(isset($_POST['cat_submit'])){
                $cat_msg=$add_cat->add_cat($_POST);
            }

            if(isset($_GET["deletid"])){
                    $id=$_GET["deletid"];
                    $delete_cat=$add_cat->delet_category($id);
            }

            if(!isset($_GET['id'])){
                echo "<meta http-equiv='refresh' content='0;url=?id=shuvo'/>";
            }

            ?>

            <div class="main-content">
             <div class="page-content">
              <div class="container-fluid">
                <!--add category start---->
                <div class="container my-4 p-4 shadow">
                  <?php if(isset($cat_msg)){ ?>
                    <span>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $cat_msg; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                    </span>
                  <?php } ?>
                <h1 class="text-center">Add Category</h1>
                <form action="" method="POST" >
                <div class="mb-3">
                <label for="cat_name" class="form-label fs-4">Catagory Name</label>
                <input type="text" name="cat_name" class="form-control">
                </div>
                <input type="submit" value="Add Category" name="cat_submit" class="form-control btn btn-primary" >
                </form>
                </div>

                <!--add category end---->

                <!--Manage category start---->
                <div class="container my-4 p-4 shadow">
                <?php if(isset($delete_cat)){ ?>
                    <span>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $delete_cat; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                    </span>
                  <?php } ?>
                <h1 class="text-center">Manage Category</h1>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Catagory Name</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                        $serial_no=1;
                        while($cat_row=mysqli_fetch_assoc($cat_info)){ ?>
                            <tr>
                            <td><?php echo $serial_no++;?></td>
                            <td><?php echo $cat_row['cat_name'];?></td>
                            <td>
                                <a class="btn-lg btn-outline-success my-2"  href=""><i class="fas fa-edit"></i></a>
                                <a class="btn-lg btn-outline-danger my-2" href="?deletid=<?php echo $cat_row['cat_id'];?>"><i class="fa fa-trash" ></i></a>
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

         