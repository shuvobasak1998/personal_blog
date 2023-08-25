<div class="col-lg-4">

<div class="sidebar">

  <h3 class="sidebar-title">Search</h3>
  <div class="sidebar-item search-form">
    <form action="">
      <input type="text">
      <button type="submit"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End sidebar search formn-->

  <h3 class="sidebar-title">Categories</h3>
  <div class="sidebar-item categories">
    <ul>
        <?php 
        if(isset($cat_info)){
            while($cat_row = mysqli_fetch_assoc($cat_info)){ ?>
                <li><a href="#"><?=$cat_row['cat_name']?> <span>(25)</span></a></li>
        <?php
            }
        }
        ?>
    </ul>
  </div><!-- End sidebar categories-->

  <h3 class="sidebar-title">Recent Posts</h3>
  <div class="sidebar-item recent-posts">
    <?php 
        if(isset($post_info)){
            while($post_row = mysqli_fetch_assoc($post_info)){ ?>
      <div class="post-item clearfix">
        <img style="width: 80px; height:auto;" src="Admin/image/<?=$post_row['img_2']?>" alt="">
        <h4><a href="blog-single.php"><?=$post_row['post_title'];?></a></h4>
        <time datetime="2020-01-01"><?=$post_row['creat_at'];?></time>
      </div>

        <?php
            }
        }
        ?>

    

    

    <div class="post-item clearfix">
      <img src="assets/img/blog/blog-recent-4.jpg" alt="">
      <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
      <time datetime="2020-01-01">Jan 1, 2020</time>
    </div>

    <div class="post-item clearfix">
      <img src="assets/img/blog/blog-recent-5.jpg" alt="">
      <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
      <time datetime="2020-01-01">Jan 1, 2020</time>
    </div>

  </div><!-- End sidebar recent posts-->

  <h3 class="sidebar-title">Tags</h3>
  <div class="sidebar-item tags">
    <ul>
    <?php 
        if(isset($tag_info)){
            while($tag_row = mysqli_fetch_assoc($tag_info)){ ?>
             <li><a href="#"><?=$tag_row['tag_name']; ?></a></li>
        <?php
            }
        }
        ?>
    </ul>
  </div><!-- End sidebar tags-->

</div><!-- End sidebar -->

</div><!-- End blog sidebar -->