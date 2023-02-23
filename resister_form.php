
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome- <?php $_SESSION["username"]?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
  .error{
    color: red;
  }
  .container{
   background-color:#e6e6e6;
  }
</style>
</head>
<body>
    <?php include"partials/navbar.php"  ?>
    <?php
    $fname=$lname=$email=$gender=$address=$city=$state=$zip="";
    $fnameErr=$lnameErr=$emailErr=$genderErr=$addressErr=$zipErr="";
    $stateErr=$cityErr="";
    $gender="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "partials/dbconnection.php";
    // $stateErr = " State is required";
    if (empty($_POST["fname"])) {
      $fnameErr = "First Name is required";
    } else {
      $fname=$_POST["fname"];
    }
    if (empty($_POST["lname"])) {
      $lnameErr = "Last Name is required";
    } else {
      $lname=$_POST["lname"];
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email=$_POST["email"];
    }
    if (empty($_POST["radio1"])) {
      $genderErr = " Gender is required";
    } else {
      $gender=$_POST["radio1"];
    }

    if (empty($_POST["address"])) {
      $addressErr = " Address is required";
    } else {
      $address=$_POST["address"];
    }

    if (empty($_POST["city"])) {
      $cityErr = " City is required";
    } else {
      $city=$_POST["city"];
    }

    if (empty($_POST["state"])) { //ye karne ki jarurat nahi bcz hamne already None ko Select kiya hai  input me
      $stateErr = " "; 
    } else {
      $state=$_POST["state"];
    }

    if (empty($_POST["zip"])) {
      $zipErr = "Zip is required";
    } else {
      $zipe=$_POST["zip"];
    }
    if(!$_POST["fname"]==""&&!$_POST["lname"]==""&&!$_POST["email"]==""&&!$gender==""&&!$_POST["address"]==""&&!$_POST["city"]==""&&!$_POST["state"]==""&&!$_POST["zip"]==""){
    $sql="INSERT INTO `register` (`first_name`, `last_name`, `email`, `gender`, `address`, `city`,`state`, `zip`, `date`) VALUES ('$fname', '$lname', '$email', '$gender', '$address', '$city', '$state', '$zip', 'current_timestamp(6).000000')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Your Registration is successfull .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        echo "result no found";
    }
  }else{
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Plzz Enter all  the required feild .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}
echo'
 <!-- registration form -->
 
   <div class="container my-5 ">
   <h6 class="error p-3">* Required Field</h6>
    <form class=" p-3" method="post" action="./resister_form.php" >
    <div class="form-group my-3 row">
      <label for="fname" class="col-sm-1 col-form-label">First Name</label>
      <div class="col-sm-5 ">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
      <span class="error">* '  .$fnameErr.'</span>
      </div>
    <div class="form-group my-3 row">
      <label for="lname" class="col-sm-1 col-form-label">Last Name</label>
      <div class="col-sm-5">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
      <span class="error">* '.$lnameErr.'</span>
    </div>
  </div>

  <div class="form-group my-3 row">
      <label for="email" class="col-sm-1 col-form-label">Email </label>
      <div class="col-sm-5">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
      <span class="error">* '.$emailErr.'</span>
    </div>
  </div>

    <div class="form-group row">
        <div class="col-form-label col-sm-1 pt-0">Gender</div>
        <div class="col-sm-4">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio1" id="radio1" value="male" >
            <label class="form-check-label" for="radio1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio1" id="radio2" value="female">
            <label class="form-check-label" for="radio1">
              Female
            </label>
          </div>
          <span class="error">* '.$genderErr.'</span>
          </div>
          </div>
          
          
    

  <div class="form-group my-3 row">
      <label for="address" class="col-sm-1 col-form-label">Address </label>
      <div class="col-sm-5">
      <input type="text" class="form-control" id="address" name="address" placeholder="Address">
      <span class="error">* '.$addressErr.'</span>
    </div>
  </div>

   
  <div class="form-group my-3 row">
      <label for="city" class="col-sm-1 col-form-label">City</label>
      <div class="col-sm-5">
      <input type="text" class="form-control" id="city" name="city" placeholder="City">
      <span class="error">* '.$cityErr.'</span>
    </div>
  </div>

 
    <div class="form-group my-3 row">
      <label for="state"  class="col-sm-1 col-form-label">State</label>
      <div class="col-sm-5">
      <select id="state" name="state" class="form-control">
      <option selected>None</option>
        <option >Maharashtra</option>
        <option>UP</option>
        <option>MP</option>
        <option>HP</option>
      </select>
      <!--  <span class="error">* '.$stateErr.'</span> Note working-->
      <span class="error">* ';if ($state=="None"){echo  " State is required" ;} echo'</span>
    </div>
    </div>
    <div class="form-group my-3 row">
      <label for="zip"  class="col-sm-1 col-form-label">Pincode</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" id="zip" name="zip">
      <span class="error">* '.$zipErr.'</span>
    </div>
  </div>
  <div class="container  my-3  col-md-5">
  <button type="submit" class="btn btn-primary  btn-lg">Resister</button>
  </div>
</form>
</div>
</div>';
?>

  
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
     
                
            
      
        