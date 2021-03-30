<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');

$_SESSION['course'] = '';
$_SESSION['topic'] = '';
$_SESSION['role'] = 'studentdashboard.php';


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
                <a style="" class="navbar-brand px-4 display-7" href="#">SchoolApp  |  Student Dashboard</a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['username']; ?>! <span class="sr-only">(current)</span></a>
                    </li>
    
                    
                    
                    <li class="nav-item mx-5">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link"  href="logout.php">LOGOUT</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>
    
    <div class="container px-5 mt-4">
    
        <div class="row mt-5 pt-5">
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-title">
                        Welcome to your Dashboard, <?php echo $_SESSION['username']; ?>!
                    </h4>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <h4 class="card-title text-capitalize">
                    firstname: <?php echo $_SESSION['firstname']; ?>
                    </h4>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <h4 class="card-title text-capitalize">
                    lastname: <?php echo $_SESSION['lastname']; ?>
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

        <?php


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
              <h3>Course registered successfully.</h3><br/>
              <p class='link'><a href='studentdashboard.php'>Refresh page</a></p>
              </div>";
    } 
}

if (isset($_REQUEST['delete'])) {
    // $result = 0;
    $username = $_SESSION['username'];
    // removes backslashes
    $delete = stripslashes($_REQUEST['delete']);
    //escapes special characters in a string
    $delete = mysqli_real_escape_string($con, $delete);
    // $email    = stripslashes($_REQUEST['email']);
    // $position    = stripslashes($_REQUEST['position']);
    // $email    = mysqli_real_escape_string($con, $email);
    // $password = stripslashes($_REQUEST['password']);
    // $password = mysqli_real_escape_string($con, $password);
    // $create_datetime = date("Y-m-d H:i:s");
    $query    = "DELETE FROM courses WHERE title = '" .$delete."'AND user = '" .$username."'";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='container'><div class=' pt-5 text-center'>
              <h3 class='-5'>Deleted successfully.</h3><br/>
              <p class='link'>Click here to <a href='studentdashboard.php'>Refresh Dashboard</a></p>
              </div></div>";
    } else {
        echo "<div class='pt-5 text-center'>
              <h3 class='mt-5 pt-5'>Delete Failed.</h3><br/>
              <p class='link'>Click here to <a href='studentdashboard.php'>Back to Dashboard</a> again.</p>
              </div>";
    }
}


        ?>

        <div class="row mt-5">

        <div class="col-md-12 mt-5 card">
        <h2 class="my-5">My Courses</h2>
        <div class="grid-container">
        
            <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM courses WHERE user='$username'";
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<div  class='grid-item'><h6 class='text-capitalize'>".$row['title'] ."</h6>
                        <form class='form mt-4' action='viewcourse.php' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input style='color:white; background-color:purple; border:none; border-radius:1rem' type='submit' name='submit' value='Open course' class='px-2 py-1 login-button'>
                        </form>
                        <form class='form mt-2' action='' method='post'>
                        <input type='hidden' id='' name='delete' value='". $row['title']. "'>
                        <input style='color:red' type='submit' name='submit' value='Unregister course' class='login-button'>
                        </form>
                        "."<br></div>";
                        }
            ?>
        </div>
        </div>

        <div class="card col-md-12 mt-5">
            <h2 class="my-5">All Courses</h2>
            <div class="grid-container">
            <?php
                        $query = "SELECT * FROM courses";
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<div class='gird-item'><h6 class='text-capitalize'>".$row['title'] ."</h6>
                        <form class='form' action='' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input type='submit' name='submit' value='Register Course' class='login-button'>
                        </form></div>
                        ";
                        }
            ?>

        </div>
        </div>
        
        </div>
    </div>
    </div>
<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
</body>
</html>
