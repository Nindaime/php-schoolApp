<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

require('db.php');

if (isset($_REQUEST['question'])) {
  $question = stripslashes($_REQUEST['question']);    // 
  $_SESSION['question'] = $question;
}


?>  


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="bootstrap.min.css?<?=filemtime("bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="stylee.css?<?=filemtime("stylee.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>

    <div class="container-fluid bg-transparent w-100 p-0">
            <nav style="background-color: purple;" class="navbar navbar-expand-md navbar-light px-0 w-100 px-5">
                <a style="font-size: 2rem" class="navbar-brand px-4 display-7" href="#">SchoolApp</a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
    
                    
    
                    <li class="nav-item font-weight-bold">
                      <a class="nav-link" href="<?php echo $_SESSION['role']; ?>">DASHBOARD</a>
                    </li>
                    
                    <li class="nav-item mx-5">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link"  href="logout.php">LOGOUT</a>
                    </li>

                  </ul>
                  
                </div>
              </nav>
        </div>
    
    <div class="container mt-5 mx-auto">
    <div class="row my-5">
    <h1 class="mt-5 pt-5">Question: <?php
         
    echo $_SESSION['question'];
     ?></h1>
    </div>

    <div class="row">

    <?php

    

if (isset($_REQUEST['newanswer'])) {
  // removes backslashes
  $answer = stripslashes($_REQUEST['newanswer']);
  //escapes special characters in a string
  $answer = mysqli_real_escape_string($con, $answer);
  // echo $answer;

    $question = $_SESSION['question'];
    // echo $question;
    // $result = 0;
    $username = $_SESSION['username'];
    // echo $username;
    
    // $email    = stripslashes($_REQUEST['email']);
    // $position    = stripslashes($_REQUEST['position']);
    // $email    = mysqli_real_escape_string($con, $email);
    // $password = stripslashes($_REQUEST['password']);
    // $password = mysqli_real_escape_string($con, $password);
    // $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `answers` (answer, user, question) VALUES ('$answer', '$username', '$question')";
    $result   = mysqli_query($con, $query);

    if ($result) {
      echo "Successfully Added";
  }
  else {
    echo "<h1>this operation failed</h1>";
  }

}

if (isset($_REQUEST['comment'])) {
  // removes backslashes
  $comment = stripslashes($_REQUEST['comment']);
  //escapes special characters in a string
  $comment = mysqli_real_escape_string($con, $comment);

  // removes backslashes
  $answerd = stripslashes($_REQUEST['answerd']);
  //escapes special characters in a string
  $answerd = mysqli_real_escape_string($con, $answerd);
  // echo $answer;

    
    // echo $question;
    // $result = 0;
    // $username = $_SESSION['username'];
    // echo $username;
    
    // $email    = stripslashes($_REQUEST['email']);
    // $position    = stripslashes($_REQUEST['position']);
    // $email    = mysqli_real_escape_string($con, $email);
    // $password = stripslashes($_REQUEST['password']);
    // $password = mysqli_real_escape_string($con, $password);
    // $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `comments` (answer, comment) VALUES ('$answerd', '$comment')";
    $result   = mysqli_query($con, $query);

    if ($result) {
      echo "Successfully Added";
  }
  else {
    echo "<h1>this operation failed</h1>";
  }

    
}

?>

    
    
    </div>
        


        <div class="row mt-5">
            
            <div class="col-md-4 mt-5">
                <h2 class="mb-5">Answer Here</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="newanswer">TYPE YOUR ANSWERS</label>
                        
                        <textarea id="newanswer" name="newanswer" class="form-control" placeholder="Course Title" required rows="4" cols="50"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary"><a style="color: white">Submit</a></button>
                </form>
            </div>

            <div class="col-md-8 d-flex mt-5">
            
                <div class="center mx-auto">

                <h2 class="mb-5 text-capitalize">All Answers</h2>
                    <?php
                    if (isset($_REQUEST['question'])) {
                            $question = stripslashes($_REQUEST['question']);    // removes backslashes
                            $question = mysqli_real_escape_string($con, $question);

                            
                        
                        
                        $username = $_SESSION['username'];
                        $_SESSION['question'] = $question;
                        
                        
                        $query = "SELECT * FROM answers WHERE question='$question'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="card mx-4 py-4"><h4 class="card-title  mx-4">'.$row['answer'] .'   </h4><i class="ml-4">Authored by:  '. $row['user'].'  </i> <div class="card-body">   '.'<p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Comment
                        </button>
                      </p>';

                      if ($_SESSION['role'] == 'lecturerdashboard.php'){
                        echo '<div class="collapse" id="collapseExample"><form>
                        <div class="form-group">
                          <label for="comment">Comments</label>
                          <input name="comment" type="text" class="form-control" id="comment" aria-describedby="comment" placeholder="Enter comments">
                        </div>

                        <div class="form-group">
                        <input name="answerd" type="hidden" class="form-control" value="'.$row['answer'] .' ">
                      </div>
                        
                        <div class="form-check">
                          <input name="correct" type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check if answer is correct</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form></div>
                                                ';
                                              }
                      
                                              else {
                                                echo '<p>Lecturers comment </p>';
                                              }
                      
                      
                      
                      echo "</div></div>
                        ". "<br>";

                        
                        

                        }
                    }

                    else {

                        $username = $_SESSION['username'];
                        $question = $_SESSION['question'];
                        
                        
                        $query = "SELECT * FROM answers WHERE question='$question'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="card mx-4 py-4"><h4 class="card-title  mx-4">'.$row['answer'] .'   </h4><i class="ml-4">Authored by:  '. $row['user'].'  </i> <div class="card-body">   '.'<p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Comment
                        </button>
                      </p>';

                      if ($_SESSION['role'] == 'lecturerdashboard.php'){
                        echo '<div class="collapse" id="collapseExample"><form>
                        <div class="form-group">
                          <label for="comment">Comments</label>
                          <input name="comment" type="text" class="form-control" id="comment" aria-describedby="comment" placeholder="Enter comments">
                        </div>

                        <div class="form-group">
                          <input name="answerd" type="hidden" class="form-control" value="'.$row['answer'] .' ">
                        </div>
                        
                        <div class="form-check">
                          <input name="correct" type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check if answer is correct</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form></div>
                                                ';
                                              }
                      
                                              else {
                                                echo '<p>Lecturers comment </p>';
                                              }
                      
                      
                      
                      echo "</div></div>
                        ". "<br>";

                        
                        

                        }

                    }
                    
                        
                    ?>

                </div>

            </div>

        </div>
    </div>

  
<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
</body>
</html>
