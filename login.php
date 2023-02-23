<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup</title>
</head>

<body>
  <?php
  include"partials/navbar.php";
 
  $login= false;
  $showError = false;
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "partials/dbconnection.php";
    $username = $_POST["username"];
    $password = $_POST["pass"];
  

    $existsql = "SELECT * FROM `user` WHERE Username='$username'";
    $result = mysqli_query($conn, $existsql);
    $num = mysqli_num_rows($result);
    if ($num ==1) {
      while($row=mysqli_fetch_assoc($result)){
        if(password_verify($password,$row['Password'])){
          $login=true;
          session_start();
          $_SESSION["loggedin"]=true;
          $_SESSION["username"]=$username;
          header("location:welcome.php");// redirect to welcome.php
        }else{
          $showError="Password not Matching";
        }
      }
    } else {
        $showError="Invalid credentials ";
    }
}

  ?>

  <?php
  if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>You sre successfully  loggedin.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>' . $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>

  <h3>You can Log in!<h3>
      <div class="container col-md-6 mt-3">
        <form method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>
 
  <button type="submit" class="btn btn-primary">Log in</button>
</form>
   
</body>

</html>