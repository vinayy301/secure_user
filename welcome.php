<?php
 session_start();
  if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!=true){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome- <?php $_SESSION["username"]?></title>
</head>
<body>
    <?php include"partials/navbar.php"  ?>
     

     <div class="container">
     <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome- <?php echo $_SESSION["username"]?></h4>
  <p>Aww yeah, you are welcome <?php echo $_SESSION["username"]?>. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to Log out <a href="/php_MYproject/Login_System/logout.php">Using this Link</a></p>
</div>
     </div>
    
</body>
</html>