<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

    require('db.php');
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
    } else {
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
                      <a class="nav-link" href="login.php">DASHBOARD</a>
                    </li>
                    
                    <li class="nav-item mx-5">
                      <a style="background-color:purple; color:white;" class="font-weight-bold nav-link btn"  href="logout.php">LOGOUT</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>
    
    <div class="container pt-5 mt-5 mx-5">
    <div class="row my-5 pt-5">
    <h1 class="mt-5 pt-5">Lecturer Dashboard</h1>
    </div>
        <div class="row top">
            <div class="col-sm-3">
                <div class="card">
                    <h4 class="card-title">
                        Hey, <?php echo $_SESSION['username']; ?>!
                    </h4>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <h4 class="card-title">
                        COURSE LIST
                    </h4>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <h4 class="card-title">
                        ADD COURSE
                    </h4>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <h4 class="card-title">
                    <a href="logout.php">Logout</a>
                    </h4>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            
            <div class="col-md-4 mt-4">
                <h2>ADD A NEW COURSE</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Course Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Course Title" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary"><a style="color: white">Submit</a></button>
                </form>
            </div>

            <div class="col-md-8 d-flex mt-5">
            
                <div class="center mx-auto">

                <h1>MY COURSES</h1>
                    <?php
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM courses WHERE user='$username'";
                        
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        
                        $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['title'] .'       '. '<a class="px-4" href="topicsform.php">Add new topic</a>' ."
                        <form class='form' action='viewcourse.php' method='post'>
                        <input type='hidden' id='' name='course' value='". $row['title']. "'>
                        <input type='submit' name='submit' value='view course' class='login-button'>
                        </form>
                        ". "<br>";
                        

                        }
                    ?>

                </div>

            </div>

        </div>
    </div>

    <?php
    }
?>
</body>
</html>
