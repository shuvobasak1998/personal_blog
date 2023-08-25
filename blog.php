  <!-- Start Header -->
  <?php include_once 'include/header.php';?>
  <!-- End Header -->
  <?php 
  include_once 'classes/category_class.php';
  $cat_obj=new category();
  $cat_info=$cat_obj->manage_cat();

  include_once 'classes/tag_class.php';
  $tag_obj=new tag();
  $tag_info=$tag_obj->manage_tag();

  include_once 'classes/post_class.php';
  $post_obj=new post();
  $post_info=$post_obj->recent_post();
  $post_summery=$post_obj->post_summery();

  ?>

  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <?php 
            if(isset($post_summery)){
                while($post_summery_row = mysqli_fetch_assoc($post_summery)){ ?>
            <article class="entry">
              <div class="entry-img">
                <img src="Admin/image/<?=$post_summery_row['thumbnail_img']?>" alt="ops!!" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php?postid=<?=$post_summery_row['post_id']?>"><?=$post_summery_row['post_title']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.php"><?=$post_summery_row['user_name']?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.php"><time datetime="2020-01-01"><?=$post_summery_row['creat_at']?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.php">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?=$post_summery_row['post_summery']?>
                </p>
                <div class="read-more">
                  <a href="blog-single.php?postid=<?=$post_summery_row['post_id']?>">Read More</a>
                </div>
              </div>

              </article><!-- End blog entry -->

            <?php
                }
            }
            ?>



            <article class="entry">

              <div class="entry-img">
                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.
                  Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.
                </p>
                <div class="read-more">
                  <a href="blog-single.php">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            <article class="entry">

              <div class="entry-img">
                <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php">Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.
                  Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.
                </p>
                <div class="read-more">
                  <a href="blog-single.php">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

    <!-- right side portation start -->
    <?php include_once 'include/blog_right_side_portation.php';?>
    <!-- right side portation end -->


        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer start ======= -->
  <?php include_once 'include/footer.php';?>
   <!-- ======= Footer end ======= -->