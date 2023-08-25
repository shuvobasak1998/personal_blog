<?php 

include_once '../classes/register.php';
$reg= new register();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $useradd=$reg->adduser($_POST);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <div class="container py-5">
      <div class="d-flex row justify-content-center">
        <div class="col-md-5">
          <div class="card">
          <?php if(isset($useradd)){ ?>
            <span>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $useradd; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </span>
            <?php } ?>
            <h1 class="card-header">Registration Form</h1>
            <div class="card-body">
              <form action="" method="POST">
               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="Email1">
                </div>
                <div class="mb-3">
                  <label for="Email1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="Email1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="Password" class="form-control" >
                </div>
                <button type="submit" name="submit" class="btn btn-success">Sign Up</button>
                <a href="login.php" class="btn btn-primary">login</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>