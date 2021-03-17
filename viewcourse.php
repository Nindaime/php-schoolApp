<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <!-- <link rel="stylesheet" href="style.css"/> -->
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['course'])) {
        $course = stripslashes($_REQUEST['course']);    // removes backslashes
        $course = mysqli_real_escape_string($con, $course);
        
        $query    = "SELECT * FROM `topics` WHERE title='$course'";

        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
            // $_SESSION['username'] = $username;
            $query    = "SELECT * FROM `topics` WHERE title='$course'";

            $result = mysqli_query($con, $query) or die(mysql_error());
            
            // Redirect to user dashboard page
            // header("Location: dashboard.php");
            $rows = $result->num_rows;
                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['topic'] ."<br>";
                        }
            
        
    } 
?>
<h1><? echo $course ?></h1>
</body>
</html>
