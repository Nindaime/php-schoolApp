<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['title'])) {
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
    <title>Dashboard - Client area</title>
    <link href="bootstrap.min.css?<?=filemtime("bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="stylee.css?<?=filemtime("stylee.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <div class="container mt-4">
    <h1>Lecturer</h1>
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


        <div class="row">
            
            <div class="col-md-4 mt-4">
                <h2>ADD A NEW COURSE</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Course Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Course Title" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><a style="color: white" href="lecturerdashboard.php">Submit</a></button>
                </form>
            </div>

            <div class="col-md-8">

                
            </div>

        </div>
    </div>

    <?php
    }
?>
</body>
</html>
