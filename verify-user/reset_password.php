<?php include 'controllers/authController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">

     <!-- Custom stlylesheet -->
     <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <title>Reset Password</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <img class="loginLogo" src="logo2.png" width= 40% height= 50% style="margin-top:15em">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title"style="color:#F1822D;">Login</h3>
        <form action="reset_password.php" method="post">
          <h3 class="text-center form-title"style="color:#F1822D;">Reset your Password</h3> <!-- or Login -->

          <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
              <?php foreach ($errors as $error): ?>
              <li>
                <?php echo $error; ?>
              </li>
              <?php endforeach;?>
            </div>
          <?php endif;?>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="reset-password-btn" style=" background-color:#F1822D;" class="btn btn-lg btn-block">Reset Password</button>
          </div>
        </form>
        <!-- form title -->


      </div>
    </div>
  </div>
</body>
</html>
