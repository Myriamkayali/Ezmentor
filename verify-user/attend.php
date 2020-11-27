<?php include 'controllers/authController.php'?>
<?php
$conn = new mysqli('localhost', 'root', '', 'mentor');

    $cID = $_SESSION['cID'];
        $uID = $_SESSION['uID'];

$lID = $_POST['lecture'];



   if (isset($_POST['lecture'])) {
     extract($_POST);



        $query = "SELECT cID,uID From `course-user` WHERE `cID` = $cID AND `uID`=$uID;";
        $result = mysqli_query($conn,$query);

          if($result->num_rows > 0) {

             mysqli_query($conn, "UPDATE `course-user` SET  `last-lecture-ID`=$lecture WHERE `cID` = $cID AND `uID`=$uID;");
             //echo"update";

              }else{
              mysqli_query($conn, "INSERT INTO `course-user`(`cID`, `uID`, `last-lecture-ID`) VALUES ($cID,$uID,$lecture)");
              // echo"inser";
          }

}

?>



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
         <div >
           <a class="logo" href="index.php">
             <img style ="margin-left: -70px;width:250px; height: 100px;" src="logo2.png" alt="logo">
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

   <!-- Hero-area -->
   <div class="hero-area section">

     <!-- Backgound Image -->
     <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
     <!-- /Backgound Image -->

     <div class="container">
       <div class="row">
         <div class="col-md-10 col-md-offset-1 text-center">
           <ul class="hero-area-tree">
             <li><a href="index.php">Home</a></li>
             <li>Course</li>
           </ul>
           <h1 class="white-text">Lecture Page</h1>

         </div>
       </div>
     </div>

   </div>
   <!-- /Hero-area -->

   <!-- Blog -->
   <div id="blog" class="section">

     <!-- container -->
     <div class="container">

       <!-- row -->
       <div class="row">

         <!-- main blog -->
         <div id="main" class="col-md-9">

           <!-- row -->
           <div class="row">

             <!-- single blog -->



           <?php



           $query="SELECT lecture.material,lecture.description,lecture.link,courses.authorlname,courses.startingdate,courses.endingdate From courses JOIN lecture WHERE courses.ID = lecture.courseID AND lecture.courseID=$cID AND lecture.lID=$lID;";
           $result = mysqli_query($conn,$query);

           while ($row = mysqli_fetch_array($result)){?>


           <div class="">
             <div class="">

               <h2><a href="blog-post.html"><?=$row['material']?></a></h2>
               <p style="font-size:20px;"> <?=$row['description']?></p>
               <div class="blog-img">

                 <iframe src=<?=$row['link']?>
                  width="800" height="500" frameborder="0" allowfullscreen></iframe>

               </div>


             </div>
           </div>
           <!-- /single blog -->
           <?php
          }
          ?>








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
