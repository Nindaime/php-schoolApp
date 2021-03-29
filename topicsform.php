<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");

if(isset($_POST['but_upload'])){
   $maxsize = 524288000; // 500MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            $_SESSION['message'] = "File too large. File must be less than 500MB.";
          }else{
             // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              if (isset($_REQUEST['topic'])) {
                  $result = 0;
                  $username = $_SESSION['username'];
                  // removes backslashes
                  $course = stripslashes($_REQUEST['course']);
                  //escapes special characters in a string
                  $course = mysqli_real_escape_string($con, $course);
                  // removes backslashes
                  $topic = stripslashes($_REQUEST['topic']);
                  //escapes special characters in a string
                  $topic = mysqli_real_escape_string($con, $topic);
                  // removes backslashes
                  $details = stripslashes($_REQUEST['details']);
                  //escapes special characters in a string
                  $details = mysqli_real_escape_string($con, $details);
                  
                
                  $query    = "INSERT into `topics` (user, title, topic, details, video)
                               VALUES ('$username', '$course', '$topic', '$details', '".$target_file."' )";
                  $result   = mysqli_query($con, $query);
                  if ($result) {
                     $_SESSION['message'] = "Upload successfully.";
                  } else {
                     $_SESSION['message'] = "Upload Failed.";
                  }
              }
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   // header('location: index.php');
   // exit;
} 


?>
<!doctype html> 
<html> 
  <head>
    <meta charset="utf-8">
     <title>Upload and Store video to MySQL Database with PHP</title>
    <link href="bootstrap.min.css?<?=filemtime("bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="stylee.css?<?=filemtime("stylee.css")?>" rel="stylesheet" type="text/css" />
  </head>
  <body>


  <div class="container-fluid bg-transparent w-100 p-0">
            <nav style="background-color: purple;" class="navbar navbar-expand-md navbar-light px-0 w-100 px-5">
                <a style="" class="navbar-brand px-4 display-7" href="#">SchoolApp  |  Lecturer</a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                  
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['username']; ?>! <span class="sr-only">(current)</span></a>
                    </li>
    
                    
                    
                    <li class="nav-item">
                    <a style="background-color:purple; color:white;" class="font-weight-bold nav-link btn"  href="lecturerdashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link"  href="logout.php">Logout</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>




    

<div class="container w-100 ">

<div class="col-sm-12 col-md-8 pt-5 my-4 mx-auto">

    <!-- Upload response -->
    <?php 
    if(isset($_SESSION['message'])){
       echo '<div class="mt-5 pt-5 alert alert-primary" role="alert">'
       .$_SESSION['message'].
     '</div>';
       unset($_SESSION['message']);
    }
    
    ?>

<h1 class="my-5 text-center" style="color:purple;">Add New Topics</h1>

<div class="col-sm-12 col-md-10 my-4 mx-auto">
   
<div class="card">
    <form class="px-5 my-4" method="post" action="" enctype='multipart/form-data'>

    <?php              
                  
    if (isset($_REQUEST['title'])) {
                  // removes backslashes
                  $title = stripslashes($_REQUEST['title']);
                  //escapes special characters in a string
                  $title = mysqli_real_escape_string($con, $title);

                  echo '<div class="form-group my-4">
                  <input type="hidden" name="course" value="'. $title.'" class="form-control" id="topic" placeholder="Course topic" required>
              </div><div class="form-group my-4">
              <h4 class="text-capitalize">Course Title: '. $title.'</h4>
              </div>';

    }
    else {
      echo '<p class="lead">
      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link btn"  href="lecturerdashboard.php">Add topic</a>
    </p>';
    }

    ?>

                     
                     <div class="form-group my-4">
                        <label for="topic"><strong>Course topic</strong></label>
                        <input type="text" name="topic" class="form-control" id="topic" placeholder="Course topic" required>
                    </div>


                    <div class="form-group">
                        <label for="comment"><strong>Course details </strong></label>
                        <textarea name="details" class="form-control" rows="5" id="comment"></textarea>
                     </div>

      
                     <div class="form-group my-4">
      <label for="file"><strong>Course Video</strong></label>
      <input type='file' name='file' class="form-control-file" id="file" required/>
                    </div>
                    
      
      <input style="background-color:purple; color:white; border:none" class="btn btn-lg" type='submit' value='Upload' name='but_upload'>
    </form>

    </div>
    
    </div>
    
    


<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
  </body>
</html>