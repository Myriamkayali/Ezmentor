<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>HTML Education Template</title>

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
		<header id="header">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div>
						<a class="logo" href="index.php">
							<img style ="margin-left: -70px;width:250px; height: 100px;"  src="logo2.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
            <li><a href="popular.php">Show most popular!</a></li>
            <li><a href="browse.php">Browse All Courses</a></li>
            <li>  <a class="logout" href="logout.php" style="  float:right; " >Logout</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li>Course</li>
						</ul>
						<h1 class="white-text"><?php $safe_value = $_POST['search']; echo"$safe_value"; ?> Courses</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-xs-9">

						<!-- row -->
						<div class="row">
  <?php
  $conn = new mysqli('localhost', 'root', '', 'mentor');
  if (isset($_POST['search'])) {
    $safe_value = $_POST['search'];
    $sql="SELECT * FROM courses WHERE name LIKE '%$safe_value%' OR topic LIKE '%$safe_value%'";
    $result = mysqli_query($conn,$sql);
    $users = mysqli_fetch_array($result);
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {?>



            <!-- single blog -->
              <div class="col-xs-4">
              <div>
                <div class="blog-img">
                  <img src="images/<?=$row['ID']?>.jpg" alt="Books" style="width:200px; height:300px">

                </div>
                <div >Course Name:<a href='description.php?id=<?php echo $row['ID']; ?>'><?php print($row['name']);?></a></div>
                 <div >Topic:<a href='description.php?id=<?php echo $row['ID']; ?>'><?php print($row['topic']);?></a></div>

              </div>
            </div>
      <?php
    }
  }
 ?>




 						</div>
 						<!-- /row -->


 					</div>
 					<!-- /main blog -->



 				</div>
 				<!-- row -->

 			</div>
 			<!-- container -->

 		</div>
 		<!-- /Blog -->

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
