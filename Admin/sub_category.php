<!-- ============================================================== -->
    <?php include_once 'include/header.php';?>
<!-- ============================================================== -->
          
<!-- ========== Left Sidebar Start ========== -->
    <?php include_once 'include/left_side_bar.php';?>
<!------------- Left Sidebar End -------------->

<?php
include_once '../classes/sub_category_class.php';
$add_sub_cat= new subcategory();
$subcatagory_info=$add_sub_cat->manage_sub_cat();

include_once '../classes/category_class.php';
$add_cat= new category();
$catagory_info=$add_cat->manage_cat();

if(isset($_POST['sub_cat_submit'])){
    $sub_cat=$add_sub_cat->add_sub_cat($_POST);
}

if(isset($_GET["deletid"])){
    $id=$_GET["deletid"];
    $delete_sub_cat=$add_sub_cat->delet_sub_category($id);
}


?>

<div class="main-content">
 <div class="page-content">
  <div class="container-fluid">

    <!--sub_category form start-->
    
          <div class="container my-4  shadow">
                <?php if(isset($sub_cat)){ ?>
                    <span>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $sub_cat; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                    </span>
                  <?php } ?>
            <h1 class="text-center">Add New Sub Category</h1>
            <form action="" method="POST">
               <div class="mb-3">
                    <label for="cat_name" class="form-label">Catagory Name</label>
                    <select name="catagory" class="form-control" id="catagory" >
                    <option value="">Select Category</option>
                    <?php while ($catagory = mysqli_fetch_assoc($catagory_info)) { ?>
                        <option value="<?php echo $catagory['cat_id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sub_category_name" class="form-label">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="sub_category_status" class="form-label">Sub Category Status</label>
                    <select name="sub_category_status" class="form-control" id="sub_category_status">
                    <option value="">Select Sub Category status</option>
                    <option value="1">Active</option>
                    <option value="2">Unactive</option>
                    </select>
                </div>
                <input type="submit" value="Add Sub Category" name="sub_cat_submit" class="form-control btn btn-primary mb-3">
            </form>
          </div>
       
    

    <!--sub_category form end-->

    <!--sub_category table start-->
    <div class="container my-4 p-4 shadow">
                <?php if(isset($delete_sub_cat)){ ?>
                    <span>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $delete_sub_cat; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                    </span>
                  <?php } ?>
      <h1 class="text-center my-3 mb-5">Manage Sub Category</h1>

        <div class="row justify-content-center">
          <div class="col-md-10">
           
            <table class="mx-5 table  ">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>SubCategory Name</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                while ($sub_cat_row = mysqli_fetch_assoc($subcatagory_info)) {
                ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $sub_cat_row['sub_cat_name'] ?></td>
                    <td><?php echo $sub_cat_row['cat_name'] ?></td>
                    <td>
                    <?php
                       if($sub_cat_row['sub_cat_status'] == 1){
                        echo 'Active';
                       }else{
                        echo 'Unactive';
                       }
                     ?>
                    </td>
                    <td><?php echo $sub_cat_row['create_at'] ?></td>
                    <td><?php echo $sub_cat_row['update_at'] ?></td>
                    <td>
                    <a class="btn-lg btn-outline-success my-2"  href=""><i class="fas fa-edit"></i></a>
                    <a class="btn-lg btn-outline-danger my-2" href="?deletid=<?php echo $sub_cat_row['sub_cat_id'];?>"><i class="fa fa-trash" ></i></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
           </div>
        </div>
    </div>
    <!--sub_category table end-->
    </div>
  </div>
</div>

 <!-- ============================================================== -->
  <?php include_once 'include/footer.php';?>
<!-- ============================================================== -->