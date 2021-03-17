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
    
    <div class="container mt-5">
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
                        echo $row['title'] .'       '. '<a class="px-4" href="topicsform.php">Add new topic</a>' .'       ' . '<a href="redirect.php">View course comments</a>' . "<br>";

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
