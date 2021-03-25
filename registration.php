<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <!-- <link rel="stylesheet" href="style.css"/> -->
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
    <link href="bootstrap.min.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>

    <div class="container">
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($con, $firstname);

        // removes backslashes
        $lastname = stripslashes($_REQUEST['lastname']);
        //escapes special characters in a string
        $lastname = mysqli_real_escape_string($con, $lastname);

        $email    = stripslashes($_REQUEST['email']);
        $position    = stripslashes($_REQUEST['position']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, firstname, lastname, password, position, email, create_datetime)
                     VALUES ('$username', '$firstname', '$lastname', '" . md5($password) . "','$position', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
?>
    
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="firstname" placeholder="First name" required />
        <input type="text" class="login-input" name="lastname" placeholder="Last name" required />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>

        <select class="login-input" name="position" id="position" required>
            <option selected value>Position</option>
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select>

        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        <p class="link"><a href="index.php">RETURN TO HOME PAGE</a></p>
    </form>


    </div>


<script src="./jquery-3.5.1.min.js" ></script>
<script src="./bootstrap.min.js"></script>
</body>
</html>
