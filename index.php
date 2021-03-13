<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Martins</title>
    <link href="bootstrap.min.css?<?=filemtime("bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="stylee.css?<?=filemtime("stylee.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <div class="wrapper container-fluid">

        <div class="container-fluid bg-transparent w-100">
            <nav class="navbar navbar-expand-md navbar-light px-0 w-100 px-5">
                <a style="background-color:#f4623a;" class="navbar-brand px-4" href="#">SchoolApp</a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
    
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                    </li>
    
                    <li class="nav-item font-weight-bold">
                      <a class="nav-link" href="registration.php">Register</a>
                    </li>
                    
                    <li class="nav-item mx-5">
                      <a style="background-color:#f4623a; color:white;" class="font-weight-bold nav-link btn"  href="login.php">LOGIN</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>
    
        <div class="container-fluid p-0 w-100">
            <div id="cover" class="cover">
    
                <div class="text">
                    <h1 class="">Welcome To<br> SCHOOL APP </h1><br><br>
                    <!-- <h4>SOFTWARE ENGINEER</h4> -->
                    <h6>
                        The best software fo managing your school <br>
                        Provides your Students and Teachers the best User experience 
                    </h6>
    
                    <hr>
    
                    <a style="background-color:#f4623a; color:white;" class="font-weight-bold nav-link btn"  href="login.php">JOIN US NOW</a>
                </div>
    
            </div>
        </div>
    
                
       
    
        <div class="container-fluid p-0 m-0 w-100">
            <div id="contacting">

                <div id="contact" class="contact p-md-5">
                
                    <div class="top mb-5 mt-5">
                        <h2>Contact me Anytime</h2>
                        <hr>
                        <p class="px-sm-5 mx-sm-5">Lets give you students the best e learning experiences</p>
                    </div>
        
                    <div class="row my-4">
                        <div class="col-sm-4 tt">
                            <a href="tel:+2348153488901"><h4>Call me +2348153488901</h4></a>
                            <a href="tel:+2348131091695"><h4>WhatsApp +2348131091695</h4></a>
                        </div>
                        <div class="col-sm-4">
                            <p>New Age School</p>
                            <p>3, peace close, ikeja</p>
                            <p>Lagos</p>
                        </div>
                        <div class="col-sm-4 tt">
                            <a href="mailto:enowebservices@gmail.com"><h4>enowebservices@gmail.com</h4></a>
                            <a href="mailto:engrmartinsbase@gmail.com"><h4>engrmartinsbase@gmail.com</h4></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
        <div class="footer container-fluid w-100">
            <footer class="p-2">
                <p class="p-0 m-0">copyright &copy; - Enobong Martins</p>
            </footer>
        </div>
    
    </div>






    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>