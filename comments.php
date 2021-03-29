<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

require('db.php');

if (isset($_REQUEST['answer'])) {
  $answer = stripslashes($_REQUEST['answer']);    // 
  $_SESSION['answer'] = $answer;
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
    <h1 class="mt-5 pt-5">Answer: <?php
         
    echo $_SESSION['answer'];
     ?></h1>
    </div>

    <div class="row">

    <?php

    

if (isset($_REQUEST['comment'])) {
  // removes backslashes
  $comment = stripslashes($_REQUEST['comment']);
  //escapes special characters in a string
  $comment = mysqli_real_escape_string($con, $comment);
  // echo $answer;

    $answer = $_SESSION['answer'];
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
    $query    = "INSERT into `comments` (answer, comment) VALUES ('$answer', '$comment')";
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
            <?php
            
            if($_SESSION['role'] == 'lecturerdashboard.php'){

                echo '<div class="col-md-4 mt-5">
                <h2 class="mb-5">Comment Here</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="comment">TYPE YOUR COMMENTS</label>
                        
                        <textarea id="comment" name="comment" class="form-control" placeholder="Lecturers Comment" required rows="4" cols="50"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary"><a style="color: white">Submit</a></button>
                </form>
            </div>';
            }
?>
            <div class="col-md-8 d-flex mt-5">
            
                <div class="center mx-auto">

                <h2 class="mb-5 text-capitalize">All Comments</h2>
                    <?php
                    if (isset($_REQUEST['answer'])) {
                            $answer = stripslashes($_REQUEST['answer']);    // removes backslashes
                            $answer = mysqli_real_escape_string($con, $answer);

                            
                        
                        
                        $username = $_SESSION['username'];
                        $_SESSION['answer'] = $answer;
                        
                        
                        $query = "SELECT * FROM comments WHERE answer='$answer'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="card mx-4 py-4"><p class="card-title  mx-4">'.$row['comment'] .'   </p>';

                     
                      
                      echo "</div><br>";

                        
                        

                        }
                    }

                    else {

                        $username = $_SESSION['username'];
                        $answer = $_SESSION['answer'];
                        
                        
                        $query = "SELECT * FROM comments WHERE answer='$answer'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="card mx-4 py-4"><p class="card-title  mx-4">'.$row['comment'] .'   </p>';

                      
                      
                      echo "</div><br>";

                        
                        

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
