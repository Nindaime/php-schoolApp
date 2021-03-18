<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
if (isset($_REQUEST['course'])) {
    // removes backslashes
    $course = stripslashes($_REQUEST['course']);
    //escapes special characters in a string
    $course = mysqli_real_escape_string($con, $course);
    $user = $_SESSION['username'];
    
    $query    = "INSERT into `courses` (user, title)
                 VALUES ('$user', '$course')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Refresh<a href='studentdashboard.php'>page</a></p>
              </div>";
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard </title>
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
                      <a class="nav-link" href="login.php">DASHBOARD</a>
                    </li>
                    
                    <li class="nav-item mx-5">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link btn"  href="logout.php">LOGOUT</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>
    
    <div class="container mt-4">
    <h1>Student</h1>
        <div class="row top">
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-title">
                        Hey, <?php echo $_SESSION['username']; ?>!
                    </h4>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <h4 class="card-title">
                        COURSE LIST
                    </h4>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <h4 class="card-title">
                        ADD COURSE
                    </h4>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <h4 class="card-title">
                    <a href="logout.php">Logout</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row mt-5">

        <div class="col-md-5 offset-md-1 mt-5">
            <h2>All Courses</h2>
            <?php
                        $query = "SELECT * FROM courses";
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<div class='card'><div class='my-5 card-body'><h5 class='card-title'>".$row['title'] ."</h5>
                        <form class='form' action='' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input type='submit' name='submit' value='Add course' class='login-button'>
                        </form></div></div>
                        ". "<br>";
                        }
            ?>

        </div>
        <div class="col-md-5 offset-md-1 mt-5">
        <h2>My Courses</h2>
            <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM courses WHERE user='$username'";
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['title'] ."
                        <form class='form' action='viewcourse.php' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input type='submit' name='submit' value='view course' class='login-button'>
                        </form>
                        "."<br>";
                        }
            ?>
        </div>
        </div>
    </div>
</body>
</html>
