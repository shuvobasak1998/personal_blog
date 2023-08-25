<?php 

include_once '../classes/password_reset_class.php';
$pass_reset= new password_reset();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $reset_password=$pass_reset->reset_pass($_POST);
}

if(isset($_GET['token']) && isset($_GET['email'])){
   $token=$_GET['token'];
   $email=$_GET['email'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <div class="container py-5">
      <div class="d-flex row justify-content-center">
        <div class="col-md-5">
          <div class="card">
          <?php if(isset($reset_password)){ ?>
            <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $reset_password; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </span>
            <?php } ?>
            <h1 class="card-header">Password Reset Form</h1>
            <div class="card-body">
              <form action="" method="POST">
              <div class="mb-3">
                  <input type="hidden" name="token" class="form-control" id="Email1" value="<?php echo $token;?>">
                </div>
                <div class="mb-3">
                  <label for="Email1" class="form-label">Email Address</label>
                  <input type="email" name="email" class="form-control" id="Email1" value="<?php echo $email;?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="Password" class="form-control" >
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                  <input type="password" name="C_Password" class="form-control" >
                </div>
                <button type="submit" name="submit" class="btn btn-success">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>