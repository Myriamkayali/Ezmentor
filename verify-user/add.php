
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
    <title>Add a Course</title>
  </head>
  <!-- Logo -->
  <div >
    <a class="logo" href="index.php">
      <img style ="margin-left: 550px;width:300px; height: 150px;" src="logo2.png" alt="logo">
    </a>
  </div>
  <!-- /Logo -->
  <body style="color:black;">

    <form class="" action="add.php" method="post" style="margin-left:50px; margin-right:50px;" >
      Enter the name of the new course: <input type="text" name="name" value="">
      <br>
      Enter the topic of the new  course: <input type="text" name="topic" value="">
      <br>
      Enter the language of the new course: <input type="text" name="language" value="">
      <br>
      Enter the author last name : <input type="text" name="author" value="">
      <br>
      Enter the cost of the new course : <input type="text" name="cost" value="">
      <br>
      Enter the startingdate of the new course: <input type="text" name="startdate" value="">
      <br>
      Enter the endingdate of the new course: <input type="text" name="enddate" value="">
      <br>
      Enter the target of the new course: <input type="text" name="target" value="">
      <br>
      Enter the syllabus of the new course: <input type="text" name="syllabus" value="">
      <br>
      Enter the quizID of the new course: <input type="text" name="quiz" value="">
      <br>
      <button class="main-button icon-button" name="button" style="width:100%; margin-top:20px; margin-bottom:50px;">Submit</button>
    </form>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'mentor');

      if (isset($_POST['button'])) {
        $coursename=$_POST['name'];
        $mytopic=$_POST['topic'];
        $mylang=$_POST['language'];
        $myauthor=$_POST['author'];
        $mycost=$_POST['cost'];
        $news=$_POST['startdate'];
        $newe=$_POST['enddate'];
        $mytarget=$_POST['target'];
        $mysyll=$_POST['syllabus'];
        $myquiz=$_POST['quiz'];

        $sql = "INSERT INTO `courses`( `name`, `topic`, `language`, `authorlname`, `cost`, `startingdate`, `endingdate`,`target`, `syllabus`, `quizID`)
                            VALUES ('$coursename','$mytopic','$mylang','$myauthor','$mycost','$news','$newe','$mytarget' ,'$mysyll',$myquiz)";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
     ?>

  </body>
</html>
