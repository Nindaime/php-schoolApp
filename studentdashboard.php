<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
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
    </div>
</body>
</html>
