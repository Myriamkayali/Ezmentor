<style>
.lecture{
margin-left: 30px;
margin-top: 20px;
}
a:link {
  text-decoration: none;
  color: #007EA7;
}
body{
    color: #007EA7;
}

</style><?php include 'controllers/authController.php'?>

<?php
$conn = new mysqli('localhost', 'root', '', 'mentor');
$cID = intval($_GET['id']);
$disable='false';

$uID= intval($_SESSION['ID']);


$t = strval(date("yy-m-d"));
$today ="'".$t."'";


   $_SESSION['cID'] = $cID;
      $_SESSION['uID'] = $uID;



if(isset($_POST['join'])) {
    $date="SELECT `startingdate`, `endingdate` FROM `courses` WHERE `ID`=$cID";

    $result = mysqli_query($conn,$date);

    $row = mysqli_fetch_row($result);
    $disable=false;
    $dated="'$row[0]'"; //starting date

    $dated2="'$row[1]'"; //ending date



     $d2="SELECT DATEDIFF($today,$dated2)"; //with the ending date
     $result2 = mysqli_query($conn,$d2);
     $row2 = mysqli_fetch_row($result2);

       $d="SELECT DATEDIFF($today,$dated)";
       $result1 = mysqli_query($conn,$d);

       $row1 = mysqli_fetch_row($result1);

           if(($row1 [0]>=0) && ($row[2]<=0)) {

        $sql = "INSERT INTO `course-user`(`cID`, `uID`) VALUES ($cID,$uID)";
        $disable='true';
         mysqli_query($conn,$sql);


       }

    else if ($row1[0]<0){
      $sql = "INSERT INTO `course-user`(`cID`, `uID`) VALUES ($cID,$uID)";
      //can join but cant attend
       mysqli_query($conn,$sql);

     }

    if($row2[0]>0){
      echo "<SCRIPT> //not showing me this
        alert('Can not join the course!Ending Date has already passed!')
        window.location.replace('index.php');
    </SCRIPT>";
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
              <li><a href="index.html">Home</a></li>
              <li>Course</li>
            </ul>
            <h1 class="white-text">join Page</h1>

          </div>
        </div>
      </div>

    </div>


 <div class="lecture">
<br><br>

              <!-- single blog -->
              <?php



              $query="SELECT lecture.description,lecture.lID,lecture.material,lecture.link From courses JOIN lecture WHERE courses.ID = lecture.courseID AND lecture.courseID=$cID ORDER BY lecture.lID ASC;";
              $result = mysqli_query($conn,$query);

              while ($row = mysqli_fetch_array($result)){
                  ?>


              <form action="attend.php" method="post">

              <h1>    Lecture :  <span><?=$row['lID']?></span><br> </h1>

                  <h3><a href="#" class="material" name="lecture" value="<?=$row['lID']?>" ><?=$row['material']?></a></h3>
                  <input type= "hidden" value= "<?=$row['lID']?>" name="lecture">
                  <p> <?=$row['description']?></p>



                  <form action="attend.php" method="post">

                        <button class="main-button icon-button" name="lecture" type="submit" value="<?=$row['lID']?>"  <?php if ($disable==false){ ?> disabled <?php   } ?> >Attend Lecture</button>

                      </form>

                      <hr>
                      <br><br>

              </form>
              <!-- /single blog -->
              <?php
            }
            ?>

          </div>





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
          <form name="quiz"  method="post">
                        <a href="quiz.php?id=<?=$cID?>" class="main-button icon-button" name="question" >Do the Quiz</a>
                    </form>

          </body>

          </html>
