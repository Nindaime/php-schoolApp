<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");

 
if(isset($_POST['but_upload'])){
   $maxsize = 5242880; // 5MB
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
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

               mysqli_query($con,$query);
               $_SESSION['message'] = "Upload successfully.";
               
               
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
                  
                  // $email    = stripslashes($_REQUEST['email']);
                  // $position    = stripslashes($_REQUEST['position']);
                  // $email    = mysqli_real_escape_string($con, $email);
                  // $password = stripslashes($_REQUEST['password']);
                  // $password = mysqli_real_escape_string($con, $password);
                  // $create_datetime = date("Y-m-d H:i:s");
                  $query    = "INSERT into `topics` (user, title, topic, video)
                               VALUES ('$username', '$course', '$topic', '".$target_file."' )";
                  $result   = mysqli_query($con, $query);
                  if ($result) {
                      echo "<div class='form'>
                            <h3>Course Added successfully.</h3><br/>
                            <p class='link'>Click here to <a href='lecturerdashboard.php'>Back to Dashboard</a></p>
                            </div>";
                  } else {
                      echo "<div class='form'>
                            <h3>Required fields are missing.</h3><br/>
                            <p class='link'>Click here to <a href='lecturerdashboard.php'>Back to Dashboard</a> again.</p>
                            </div>";
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
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>

<div class="container w-100">

<div class="col-sm-8 col-md-5 my-4 d-flex">
    <form class="mx-auto my-4" method="post" action="" enctype='multipart/form-data'>

                  <div class="form-group my-4">
                        <label for="topic">Course topic</label>
                        <input type="text" name="topic" class="form-control" id="topic" placeholder="Course topic" required>
                    </div>
                  

                    <div class="form-group my-4">
                    <label for="coursetitle">Select Course</label>
                     <select name="course" class="form-control" id="coursetitle">
                        <option value="monday">monday</option>
                        <option value="teusday">teusday</option>
                        <option value="wednesday">wednesday</option>
                        <option value="thursday">thursday</option>
                     </select>
                     </div>

      
                     <div class="form-group my-4">
                        <label for="file">Course file</label>
                        <input type='file' name='file' class="form-control-file" id="file"/>
                    </div>
                    
      
      <button class="my-4 btn btn-primary"><input type='submit' value='Upload' name='but_upload'></button>
    </form>
    </div>

</div>
  </body>
</html>