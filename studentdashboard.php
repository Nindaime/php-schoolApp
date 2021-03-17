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
                        echo "<div class=d-flex><h5 class='mx-4'>".$row['title'] ."</h5>
                        <form class='form' action='' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input type='submit' name='submit' value='Add course' class='login-button'>
                        </form></div>
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
