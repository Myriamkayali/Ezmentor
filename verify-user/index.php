<?php include 'controllers/authController.php'?>

<?php
$con = new mysqli('localhost', 'root', '', 'mentor');
// redirect user to login page if they're not logged in
if (isset($_GET['token'])) {
  $token=$_GET['token'];
  verifyUser($token);
}

if (isset($_GET['password-token'])) {
  $passwordToken=$_GET['password-token'];
  resetPassword($passwordToken);
}


if (empty($_SESSION['ID']) || ($_SESSION['verified']==false)) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>User verification system PHP</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css"/>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  </head>

<body>

  		<!-- Header -->
  		<header id="header" class="transparent-nav">
  			<div class="container">

  				<div class="navbar-header">
  					<!-- Logo -->
  					<div >
  						<a class="logo" href="index.php">
  							<img style ="margin-left: -70px;width:250px; height: 100px;" src="logo.png" alt="logo">
  						</a>
  					</div>
  					<!-- /Logo -->


  				</div>

  				<!-- Navigation -->
  				<nav id="nav">
  					<ul class="main-menu nav navbar-nav navbar-right" >
  						<li ><a href="index.php">Home</a></li>
  						<li><a href="popular.php">Show most popular!</a></li>
  						<li><a href="browse.php">Browse All Courses</a></li>
              <li>  <a class="logout" href="logout.php" style="  float:right; " >Logout</a></li>

  					</ul>
  				</nav>
  				<!-- /Navigation -->

  			</div>
  		</header>
  		<!-- /Header -->


      <!-- Home -->
  		<div id="home" class="hero-area">

  			<!-- Backgound Image -->
  			<div class="bg-image bg-parallax overlay" style="background-image:url(./background1.jpg)"></div>
  			<!-- /Backgound Image -->

  			<div class="home-wrapper">
  				<div class="container">
  					<div class="row">
  						<div class="col-md-8">
  							<h1 class="white-text">Ezmentor Free Online Training Courses</h1>


                  <h4 class="white-text" style="color:#F1822D;">Welcome, <?php echo $_SESSION['username']; ?> !</h4>


  						    <form class="searchbox"  action="search.php" method="post">
                            <input class="search" type="search" name="search" placeholder="What do you want to learn? " size="25">

                    </form><

  						</div>
  					</div>
  				</div>
  			</div>

  		</div>
      <!-- /Home -->
      <!-- About -->
      <div id="about" class="section">

        <!-- container -->
        <div class="container">

          <!-- row -->
          <div class="row">

            <div class="col-md-6">
              <div class="section-header">
                <h2>Welcome to Ezmentor</h2>
                <p class="lead">We envision a world where anyone, anywhere can transform their life by accessing the world’s best learning experience.</p>
              </div>

              <!-- feature -->
              <div class="feature">
                <i class="feature-icon fa fa-flask"></i>
                <div class="feature-content">
                  <h4>Online Courses </h4>
                  <p>Every course on Ezmentor is taught by top instructors from world-class universities and companies, so you can learn something new anytime, anywhere. Hundreds of free courses give you access to on-demand video lectures, homework exercises, and community discussion forums. Paid courses provide additional quizzes and projects as well as a shareable Course Certificate upon completion.</p>
                </div>
              </div>
              <!-- /feature -->

              <!-- feature -->
              <div class="feature">
                <i class="feature-icon fa fa-users"></i>
                <div class="feature-content">
                  <h4>Specializations</h4>
                  <p>If you want to master a specific career skill, consider enrolling in a Specialization. You’ll complete a series of rigorous courses at your own pace, tackle hands-on projects based on real business challenges, and earn a Specialization Certificate to share with your professional network and potential employers.</p>
                </div>
              </div>
              <!-- /feature -->



            </div>

            <div class="col-md-6">
              <div class="about-img">
                <img src="./img/about.png" alt="">
              </div>
            </div>

          </div>
          <!-- row -->

        </div>
        <!-- container -->
      </div>
      <!-- /About -->





        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['type'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>

        <?php endif;?>


        <?php if (!$_SESSION['verified']): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            You need to verify your email address!
            Sign into your email account and click
            on the verification link we just emailed you
            at
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div>


        <?php endif;?>





    <h2 style="margin-left:40px;margin-right:40px;" >Filter courses</h2>

    <form action="filter.php" method="post" style="margin-left:40px;margin-right:40px;">
      <div class="row">
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control" name="authorlname">
                  <option value="">Select Author</option>
                  <?php

                      $q = "SELECT DISTINCT(authorlname) FROM courses";
                      $r = mysqli_query($con, $q);
                      $num=mysqli_num_rows($r);

                      if (!$r) {
                      die(mysqli_error($dbc));
                      }
                      if($num>0){

                        while($row = mysqli_fetch_array($r)){

                  ?>
                  <option value="<?=$row['authorlname']?>"><?=$row['authorlname']?></option>

                  <?php
                            }
                      }
                  ?>
              </select>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control" name="topic">
                  <option value ="">Topics</option>
                  <?php

                      $q = "SELECT  DISTINCT topic FROM courses";
                      $r = mysqli_query($con, $q);
                      $num=mysqli_num_rows($r);

                      if (!$r) {
                      die(mysqli_error($dbc));
                      }
                      if($num>0){

                        while($row = mysqli_fetch_array($r)){

                  ?>
                  <option value="<?=$row['topic']?>"><?=$row['topic']?></option>

                  <?php
                            }
                      }
                  ?>
              </select>
          </div>
      </div>

  	    <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control" name="cost">
                  <option value="">Select cost </option>
                  <?php

                      $q = "SELECT DISTINCT cost FROM courses";
                      $r = mysqli_query($con, $q);
                      $num=mysqli_num_rows($r);

                      if (!$r) {
                      die(mysqli_error($dbc));
                      }
                      if($num>0){

                        while($row = mysqli_fetch_array($r)){

                  ?>
                  <option value="<?=$row['cost']?>"><?=$row['cost']?></option>

                  <?php
                            }
                      }
                  ?>
              </select>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control" name="language">
                  <option value ="">Language</option>
                  <?php

                      $q = "SELECT DISTINCT language FROM courses";
                      $r = mysqli_query($con, $q);
                      $num=mysqli_num_rows($r);

                      if (!$r) {
                      die(mysqli_error($dbc));
                      }
                      if($num>0){

                        while($row = mysqli_fetch_array($r)){

                  ?>
                  <option value="<?=$row['language']?>"><?=$row['language']?></option>

                  <?php
                            }
                      }
                  ?>
              </select>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control" name="startingdate">
                  <option value ="">Starting Date</option>
                  <?php

                      $q = "SELECT DISTINCT startingdate FROM courses";
                      $r = mysqli_query($con, $q);
                      $num=mysqli_num_rows($r);

                      if (!$r) {
                      die(mysqli_error($dbc));
                      }
                      if($num>0){

                        while($row = mysqli_fetch_array($r)){

                  ?>
                  <option value="<?=$row['startingdate']?>"><?=$row['startingdate']?></option>

                  <?php
                            }
                      }
                  ?>
              </select>
          </div>
      </div>
  </div>

  	<button type="submit" class="main-button icon-button" class="btn btn-primary">Apply</button>
    <br>
  </form>
  </div>
  <div class="mycourses">
  <?php
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $link = new mysqli('localhost', 'root', '', 'mentor');
  $link->set_charset('utf8mb4'); // always set the charset
  $name = $_SESSION["username"];
  $stmt = $link->prepare("SELECT ID FROM Users WHERE username=? limit 1");
  $stmt->bind_param('s', $name);
  $stmt->execute();
  $result = $stmt->get_result();
  $value = $result->fetch_object();
  $myid = $value->ID;
  $statement= "SELECT * FROM `course-user` WHERE uID=$myid";
  $result1 = mysqli_query($link,$statement);
  $users = mysqli_fetch_array($result1);
  $result1 = $link->query($statement);
  echo "<h4 style=margin-left:40px;margin-right:40px;>The courses I'm currently enrolled in are:</h4>";
  echo "</br>";


  while($row = $result1->fetch_assoc()){
    $lastID=$row['cID'];
    $lectureID=$row['last-lecture-ID'];
    $lastSql= "SELECT name FROM courses WHERE ID=$lastID";
    $lastRes=mysqli_query($link,$lastSql);
    $TheNames=mysqli_fetch_array($lastRes);
    $lastRes = $link->query($lastSql);
    while($lastRow= $lastRes->fetch_assoc()){
      $lastname=$lastRow['name'];
      ?>
      <div style="margin-left:50px;">
        <?php
      echo "<h5>$lastname</h5>";
?>
</div>
  <?php
   }

   ?>
   <div style="margin-left:40px;" class="main-button icon-button" class="btn btn-primary">
   <?php

     echo "&nbsp"; echo "&nbsp"; echo "&nbsp";
    echo "<a href='join.php?id=$lastID'>ATTEND</a>";
    ?>
  </div>
    <div style="margin-left:30px;" class="main-button icon-button" class="btn btn-primary">
    <?php
    echo "&nbsp"; echo "&nbsp";
    echo "<a href='resume.php?id=$lastID&lastLecture=$lectureID'>RESUME</a>";
?>

</div>
<?php
        echo "<br/>";
  }
   ?>
<br><br>
<div class="centered">
  <?php if ($_SESSION['username']=='admin'){

  ?>
  <form  style="margin-left:30px;"   action="add.php" method="post">
    <button  class="main-button icon-button"  name="add">Add a Course</button>
  </form>
  <br>
  <form  style="margin-left:30px;" class="form1"  action="delete.php" method="post">
      <button class="main-button icon-button"  name="delete">Delete a Course</button>
  </form>
  <br>
  <form style="margin-left:30px;" class="form1" action="edit.php" method="post">
      <button class="main-button icon-button" name="edit">Edit a Course</button>
  </form>




  <?php } ?>
<br>
  <form style="margin-left:30px;" class="form1" action="index.php" method="post">
    <button   class="main-button icon-button" name="deactivate">Deactivate your account</button>
    <button  class="main-button icon-button" name="delete">Delete your account</button>
  </form>

<br>
</div>
<br>
<div class="">
  <?php if ($_SESSION['username']=='admin'){ ?>
    <form style="margin-left:30px;" class="form1" action="deactivate.php" method="post">
        <button  class="main-button icon-button" name="dea">Deactivate an Account</button>
    </form>
  <?php } ?>
</div>
<!-- Contact CTA -->
<div id="contact-cta" class="section">

  <!-- Backgound Image -->
  <div class="bg-image bg-parallax overlay" style="background-image:url(./img/cta2-background.jpg)"></div>
  <!-- Backgound Image -->

  <!-- container -->
  <div class="container">

    <!-- row -->
    <div class="row">

      <div class="col-md-8 col-md-offset-2 text-center">
        <h2 class="white-text">Contact Us</h2>
        <p class="lead white-text">In case of emergency or if you need any help, contact us using the info below.</p>

      </div>

    </div>
    <!-- /row -->

  </div>
  <!-- /container -->

</div>
<!-- /Contact CTA -->


  <!-- CONTACT -->
  	<section id="contact">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="section-title">

  						<span class="st-border"></span>
  					</div>
  				</div>
  				<div class="col-sm-4 contact-info" style="margin-top:20px;">
  					<p class="st-address"><i class="fa fa-map-marker"></i> <strong>American University of Beirut, Department of Computer Science</strong></p>


  					<!--<p class="st-website"><i class="fa fa-globe"></i><a href="index.html"> <strong>http://supermeterwebsite.azurewebsites.net</strong></a></p>-->

  				</div>
  				<div style="margin-bottom:20px;">
  					<form action="index.php"  name="contact-form" method="post">
  						<div >
  							<div>
  								<input type="text" name="name" required="required" placeholder="Name">
                  <br>
  								<input type="email" name="email" required="required" placeholder="Email">
                  <br>
  								<textarea name="message" required cols="35" rows="7" placeholder="Message"></textarea>
  							</div>

  								<button class="main-button icon-button" name="contact">Send Message!</button>

  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</section>
  	<!-- /CONTACT -->




<form class="" action="index.php" method="post">

</form>




<!-- Footer -->
<footer id="footer" class="section">

  <!-- container -->
  <div class="container">

    <!-- row -->
    <div class="row">

      <!-- footer logo -->
      <div class="col-md-6">
        <div class="footer-logo">
          <a class="logo" href="index.php" >
            <img  src="logo2.png" alt="logo">
          </a>
        </div>
      </div>
      <!-- footer logo -->



    </div>
    <!-- /row -->



  </div>
  <!-- /container -->

</footer>
<!-- /Footer -->

<!-- preloader -->
<div id='preloader'><div class='preloader'></div></div>
<!-- /preloader -->


<!-- jQuery Plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>

</html>
