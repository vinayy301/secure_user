<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Partials aisi file hai jiske code ko bina likhe other file me  use kar sakate hai
         navbar ka code login logout aur signup page use kar sakate hai bina navbar ka code likhe php ke
        require method se.  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<?php
 if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true){
  $loggedin=true;
}else{
  $loggedin=false;
}
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./partials/welcome.php">Secure_System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
        if(!$loggedin){
       echo' <li class="nav-item">
          <a class="nav-link" href="/myproject/Login_System/login.php">Log_In</a>
        </li>';}
        if($loggedin){
        echo'<li class="nav-item">
          <a class="nav-link" href="/myproject/Login_System/logout.php">Log_Out</a>
        </li>';}
        if(!$loggedin){
        echo'<li class="nav-item">
          <a class="nav-link" href="/myproject/Login_System/signup.php">Sign_Up</a>
        </li>';
        
      }
      echo'<li class="nav-item">
        <a class="nav-link" href="/myproject/Login_System/resister_form.php">Registration</a>
      </li>';
      
       
      echo'</div>
    </div>
  </nav>'
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>    
  </body>
  </html>
       
         