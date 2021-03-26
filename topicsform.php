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
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
              
               
               
               
               if (isset($_REQUEST['course'])) {
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
                  
                  // $email    = stripslashes($_REQUEST['email']);
                  // $position    = stripslashes($_REQUEST['position']);
                  // $email    = mysqli_real_escape_string($con, $email);
                  // $password = stripslashes($_REQUEST['password']);
                  // $password = mysqli_real_escape_string($con, $password);
                  // $create_datetime = date("Y-m-d H:i:s");
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

    <!-- Upload response -->
    <?php 
    if(isset($_SESSION['message'])){
       echo '<div class="alert alert-primary" role="alert">'
       .$_SESSION['message'].
     '</div>';
       unset($_SESSION['message']);
    }
    
    ?>

<div class="container w-100 ">
<h1 class="my-5 text-center" style="color:purple;">Add New Topics</h1>

<div class="col-sm-12 col-md-8 my-4 mx-auto">
   
<div class="card">
    <form class="mx-auto my-4" method="post" action="" enctype='multipart/form-data'>

    <?php              
                  
    if (isset($_REQUEST['title'])) {
                  // removes backslashes
                  $title = stripslashes($_REQUEST['title']);
                  //escapes special characters in a string
                  $title = mysqli_real_escape_string($con, $title);

                  echo '<div class="form-group my-4">
                  <label for="topic">Course topic</label>
                  <input type="text" name="course" value="'. $title.'" class="form-control" id="topic" placeholder="Course topic" required>
              </div>';

    }

    ?>

                     <div class="form-group my-4">
                        <label for="topic">Course topic</label>
                        <input type="text" name="topic" class="form-control" id="topic" placeholder="Course topic" required>
                    </div>


                    <div class="form-group">
                        <label for="comment">Course details :</label>
                        <textarea name="details" class="form-control" rows="5" id="comment"></textarea>
                     </div>

      
                     <div class="form-group my-4">
      <label for="file">Course Video</label>
      <input type='file' name='file' class="form-control-file" id="file" required/>
                    </div>
                    
      
      <input class="btn btn-lg" style="background-color:purple; color:white; border:none" type='submit' value='SAVE' name='but_upload'>
    </form>

    </div>
    
    </div>
    
    <div class="button-wrap w-50 mx-auto">
    <a style="background-color:purple; color:white;" class="font-weight-bold nav-link btn"  href="lecturerdashboard.php">BACK TO DASHBOARD</a>
    
    </div>

</div>

<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
  </body>
</html>