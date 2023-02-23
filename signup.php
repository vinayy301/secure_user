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
 
  $showAlert = false;
  $showError = false;
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "partials/dbconnection.php";
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $conpassword = $_POST["conPass"];

    $existsql = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($conn, $existsql);
    $existnumRows = mysqli_num_rows($result);
    if ($existnumRows > 0) {
      $showError = "Username already exist";
    } else {

      if ($password == $conpassword) {
        $hashpass=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` ( `Username`, `Password`, `Date`) VALUES ( '$username', '$hashpass', current_timestamp())";
  
        $result = mysqli_query($conn, $sql);
      
        if ($result) {
          $showAlert = true;
        }
      } else {
        $showError = "Password do not match";
      }
    }
  }

  ?>

  <?php
  if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>Your acount is created and ready to login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if ($showError) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Error!</strong>' . $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>

  <h3>Sign Up before Log In!<h3>
      <div class="container col-md-6 mt-3">
        <form method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control border-dark" id="username" name="username" aria-describedby="emailHelp">

          </div>
          <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control border-dark" id="pass" name="pass">
          </div>
          <div class="mb-3">
            <label for="conPass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control  border-dark" id="conPass" name="conPass">
          </div>

          <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
      </form>
</body>

</html>