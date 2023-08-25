<?php 
include_once '../classes/email_resend_class.php';
$resend=new resend_email();

if(isset($_POST["submit"])){
 $resend_email=$resend->resendemail($_POST);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resend email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <div class="container py-5">
      <div class="d-flex row justify-content-center">
        <div class="col-md-5">
          <div class="card">
         
            <?php if(isset($resend_email)){ ?>
            <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $resend_email; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </span>
            <?php } ?>
            <h1 class="card-header">Resend Email Form</h1>
            <div class="card-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="Email1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Resend</button>
                <a href="login.php" class="btn btn-warning">login</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>



