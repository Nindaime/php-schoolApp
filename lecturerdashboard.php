<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

    require('db.php');


    
$_SESSION['course'] = '';
$_SESSION['topic'] = '';
$_SESSION['role'] = 'lecturerdashboard.php';

 
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
    
                    

                    
                    <li class="nav-item">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link"  href="logout.php">LOGOUT</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>

        <div class="message">

        <?php

            // When form submitted, insert values into the database.
    if (isset($_REQUEST['title'])) {
        $result = 0;
        $username = $_SESSION['username'];
        // removes backslashes
        $title = stripslashes($_REQUEST['title']);
        //escapes special characters in a string
        $title = mysqli_real_escape_string($con, $title);
        // $email    = stripslashes($_REQUEST['email']);
        // $position    = stripslashes($_REQUEST['position']);
        // $email    = mysqli_real_escape_string($con, $email);
        // $password = stripslashes($_REQUEST['password']);
        // $password = mysqli_real_escape_string($con, $password);
        // $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `courses` (user, title)
                     VALUES ('$username', '$title' )";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='container'><div class='mt-5 pt-5'>
                  <h3 class='-5'>Course Added successfully.</h3><br/>
                  <p class='link'>Click here to <a href='lecturerdashboard.php'>Refresh Dashboard</a></p>
                  </div></div>";
        } else {
            echo "<div class=''>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='lecturerdashboard.php'>Back to Dashboard</a> again.</p>
                  </div>";
        }
    }

        ?>

        </div>
    
    
    
    <div class="container">
    
            <h1 class="ml-auto my-5 pt-5 d-flex">Lecturer Profile</h1>
        
          <div class="d-flex">
          <div class="col-md-4 card" style="background-color:purple; color:white;">
                
                <hdiv class="card-title">
                Welcome to your Dashboard,  <h4><?php echo $_SESSION['username']; ?>!</h4>
</div>
                                   
        </div>
        <div class="col-md-4 card">
        <h4 class="card-title">
                    Firstname: <span><?php echo $_SESSION['firstname']; ?></span>
                </h4>
                <h4 class="card-title">
                    Lastname: <span><?php echo $_SESSION['lastname']; ?></span>
                </h4>

        </div>
          </div>
            
            
        

<div class="container">
        <div class="row mt-5">
            
            <div class="col-lg-4 mt-5">
                <h4 class="mb-5 text-center">ADD A NEW COURSE</h4>
                <form action="" method="post" class="card p-5">
                    <div class="form-group">
                        <label for="title">Course Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Course Title" required>
                    </div>
                    
                    <button style="background-color: purple; border:none;" type="submit" name="submit" class="btn btn-primary"><a style="color: white">Submit</a></button>
                </form>
            </div>

            <div class="col-lg-8 d-flex mt-5">
            
                <div class="center mx-auto">

                <h4 class="mb-3 text-center">MY COURSES</h4>
                <div class="grid-container2">
                    <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM courses WHERE user='$username'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="card grid-item mx-4 py-4"><h4 class="text-capitalize card-title mx-4">'.$row['title'] .'   </h4> <div class="">   '. "
                        <form class='form' action='viewcourse.php' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input style='background-color: gray; border:none; color:white;'  type='submit' name='submit' value='Open course' class='login-button btn'>
                        </form>"."<br>"
                        ."<form class='form' action='topicsform.php' method='post'>
                        <input type='hidden' id='' name='title' value='". $row['title']. "'>
                        <input style='background-color: gray; border:none; color:white;' type='submit' name='submit' value='Add new topic' class='login-button btn'>
                        </form>"."</div></div>
                        ";
                        

                        }
                    ?>

                </div>
                </div>

            </div>

        </div>
        </div>
    </div>


</div>
<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
</body>
</html>
