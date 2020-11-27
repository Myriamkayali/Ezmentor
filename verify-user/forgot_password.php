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
  <title>Forgot Password</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <img class="loginLogo" src="logo2.png" width= 40% height= 50% style="margin-top:15em">

      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title"style="color:#F1822D;">Login</h3>
        <form action="forgot_password.php" method="post">
          <h3 class="text-center form-title"  style="color:#F1822D;">Recover Your Password</h3> <!-- or Login -->
          <p>Please enter your email address you used to sign up on this site and we will assist you in recovering your password.</p>
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

            <input type="email" name="email" class="form-control form-control-lg" >
          </div>
          <div class="form-group" class="form-group" class="main-button icon-button" class="btn btn-primary" >
            <button type="submit" name="forgot-password" style=" background-color:#F1822D;"  class="btn btn-lg btn-block"class="btn btn-primary btn-block btn">Recover your Password</button>
          </div>

        </form>
        <!-- form title -->


      </div>
    </div>
  </div>
</body>
</html>
