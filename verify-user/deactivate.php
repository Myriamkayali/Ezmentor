<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="add.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <title>Deactivate an Account</title>
  </head>
  <!-- Logo -->
  <div >
    <a class="logo" href="index.php">
      <img style ="margin-left: 550px;width:300px; height: 150px;" src="logo2.png" alt="logo">
    </a>
  </div>
  <!-- /Logo -->
  <body>
    <form action="deactivate.php" method="post"style="margin-left:50px; margin-right:50px;">
      Specify the username of the account you want to deactivate:
      <input type="text" name="username" value="">
    </form>
    <?php

      if (isset($_POST['username'])) {
        $uname= $_POST['username'];
        $conn = new mysqli('localhost', 'root', '', 'mentor');
        $sql="UPDATE  `users` SET `verified`=0 WHERE `username`='$uname' ";
        $result = mysqli_query($conn,$sql) ;
        if ($conn->query($sql) === TRUE) {
          echo "Deactivated successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }



     ?>

  </body>
</html>
