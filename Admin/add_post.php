<!-- ============================================================== -->
<?php include_once 'include/header.php';?>
<!-- ============================================================== -->
          
 <!-- ========== Left Sidebar Start ========== -->
    <?php include_once 'include/left_side_bar.php';?>
 <!------------- Left Sidebar End -------------->

<?php 
include_once '../classes/tag_class.php';
$tag_obj= new tag();
$tag_info=$tag_obj->manage_tag();

include_once '../classes/post_class.php';
$post_class= new post();

  if(isset($_POST['post_submit'])){
    $post=$post_class->add_post($_POST);
  }

include_once '../classes/category_class.php';
$add_cat= new category();
$catagory_info=$add_cat->manage_cat();

// include_once '../classes/tag_class.php';
// $tag= new tag();
// $tag_info=$tag->manage_tag();

 ?>

<div class="main-content">
  <div class="page-content">
   <div class="container-fluid">

               
   <div class="container my-3  shadow">
     <?php if(isset($post)){ ?>
          <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $post; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </span>
      <?php } ?>
    <h1 class="text-center">Add Blog Post</h1>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <input type="hidden" name="userId" class="form-control" value="<?=session::get('userid')?>" >
    </div>
    <div class="form-group">
    <label for="post_title" class="form-label mb-1">Post Title</label>
    <input type="text" name="post_title" class="form-control" >
    </div>
    <div class="form-group">
    <label for="post_catagory" class="form-label mb-1">Select Post Catagory</label><br>
    <select name="post_catagory" class="form-control" id="category-dropdown" >
    <option value="" >Select Category</option>
        <?php while($catagory=mysqli_fetch_assoc($catagory_info)){ ?>
        <option value="<?php echo $catagory['cat_id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
        <?php }?>
    </select>
    </div>

    <div class="form-group">
    <label for="post_sub_catagory" class="form-label mb-1">Select Post sub Catagory</label><br>
    <select name="post_sub_catagory" class="form-control" id="sub-category-dropdown" >


    </select>
    </div>

    <div class="form-group">
    <label for="post_disc" class="form-label mb-1">Post Discription</label>
    <textarea name="post_disc" id="your_summernote" class="form-control" rows="4"></textarea>
    </div>

    <div class="form-group">
    <label for="post_img" class="form-label mb-1" required>Upload Thumbnail</label><br>
    <input type="file" name="post_img_1" id="post_img"  >
    </div>

    <div class="form-group">
    <label for="post_summery" class="form-label mb-1">Post Summery</label>
    <input type="text" name="post_summery" id="post_summery" class="form-control py-4"  >
    </div>

    <div class="form-group">
    <label for="post_img" class="form-label mb-1" required>Upload Image</label><br>
    <input type="file" name="post_img_2" id="post_img"  >
    </div>

    <div class="form-group">
    <label for="post_tag" class="form-label mb-1">Post Tags</label>
    <select name="post_tag[]" class="js-example-basic-multiple form-control" multiple="multiple" >
    <option value="" >Select Tag</option>
    <?php while($tag_row=mysqli_fetch_assoc($tag_info)){ 
      $tag_id=$tag_row['tag_id'];
      $tag_name=$tag_row['tag_name'];
      ?>
    <?php  echo "<option value='$tag_id'>$tag_name</option>";   
   }?>
    </select>
    </div>    

    <div class="form-group">
    <label for="post_type" class="form-label mb-1">Select Post Type</label>
    <select name="post_type" class="form-control" id="post_type" >
    <option value="" >Select Post Type</option>
    <option value="1">Banner</option>
    <option value="2">Post</option>
    </select>
    </div>

    <div class="form-group">
    <label for="post_status" class="form-label mb-1">Select Post Status</label>
    <select name="post_status" class="form-control" id="post_status" >
    <option value="" >Select Post Status</option>
    <option value="1">Published</option>
    <option value="2">Unpublished</option>
    </select>
    </div>
    <input type="submit" name="post_submit" value="Add Post" class="form-control btn btn-primary my-2" >
    </form>
   </div>
        
    </div>
  </div>
</div>

     <!-- ============================================================== -->
     <?php include_once 'include/footer.php';?>
     <!-- ============================================================== -->

         