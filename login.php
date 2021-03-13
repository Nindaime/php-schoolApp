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
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $query    = "SELECT position FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
            $result = mysqli_query($con, $query) or die(mysql_error());
            
            // Redirect to user dashboard page
            // header("Location: dashboard.php");
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  echo $row["position"]. "<br>";
                  if($row["position"] == "lecturer"){
                    header("Location: lecturerdashboard.php");
                  }
                  if($row["position"] == "student"){
                    header("Location: studentdashboard.php");
                  }
                }
              } else {
                echo "0 results";
              }
            
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        <p class="link"><a href="index.php">RETURN TO HOME PAGE</a></p>
  </form>
<?php
    }
?>
</body>
</html>
