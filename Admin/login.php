<?php 
include_once '../classes/admin_login.php';
$admin=new adminlogin();

if(isset($_POST["submit"])){
 $admin_login_res=$admin->login_admin($_POST);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <div class="container py-5">
      <div class="d-flex row justify-content-center">
        <div class="col-md-5">
          <div class="card">
          <?php if(isset($_SESSION['status'])){ ?>
            <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['status']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </span>
            <?php } ?>
            <?php if(isset($admin_login_res)){ ?>
            <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $admin_login_res; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </span>
            <?php } ?>
            <h1 class="card-header">Login Form</h1>
            <div class="card-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="Email1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="Password" class="form-control" >
                </div>
                <button type="submit" name="submit" class="btn btn-success">Login</button>
                <a class="btn btn-primary" href="registration.php">Sign Up</a>
                <a class="float-end text-decoration-none" href="forget_password.php">Forget Your Password..?</a>
              </form>
              <hr>
              <h6>Did Not Received Your Varification Email.? <a class="text-decoration-none" href="resend_email.php">Resend</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>