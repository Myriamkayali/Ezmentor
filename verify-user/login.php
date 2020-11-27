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

     <!-- Custom stlylesheet -->
     <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <title>User verification system PHP - Login</title>
</head>
<body>

  <div class="container">
    <div class="row">
       <img class="loginLogo" src="logo2.png" width= 40% height= 50% style="margin-top:15em">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title" style="color:#F1822D;">Login</h3>
        <form action="login.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control form-control-lg" value="<?php if(isset($_COOKIE["user"])) {echo $_COOKIE["user"];}?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg" value="<?php if(isset($_COOKIE["pass"])) {echo $_COOKIE["pass"];}?>">
          </div>
          <div class="form-group" class="main-button icon-button" class="btn btn-primary" >
            <button type="submit" style=" background-color:#F1822D;"  name="login-btn"  class="btn btn-lg btn-block" <?php if(isset($_COOKIE["user"])) { ?> checked <?php }?> >Login</button>
          </div>
          <div class="checkbox" style="text-align:center">
              <input name="rememberme" id="remember" type="checkbox" />

                                    <label >
                                        Remember Me
                                    </label>
                                </div>
        </form>
        <!-- form title -->
<h3 class="text-center form-title" style="color:#F1822D;">Register</h3> <!-- or Login -->

<?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
        <p>Don't yet have an account? <a href="signup.php">Sign up</a></p>
        <p>Deacativated your account? <a href="active.php">Activate</a></p>
        <div style="font-size: 0.8em; text-align:center;">
          <a href="forgot_password.php">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
