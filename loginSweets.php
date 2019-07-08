






<?php 
    session_start();
    include('config.php');
    $errormessage = "Enter email & Password";
    $email = $password = "";


if (isset($_POST['Login'])){
    if (!preg_match("/^[a-z0-9._]*$/i",$email)){
        $errormessage = "Invalid email";
    }else{
     $email = test_input($_POST['email']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con,$sql);
    
    if (mysqli_num_rows($result) == 1){
        header('Location:index.php');
        
        $sql = "SELECT * FROM register WHERE email = '$email' AND password= '$password'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        print_r($row);
        exit;
        if ($row){
            
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
          
        }
    }else{
        $errormessage = "Invalid email & Password";
    }
    }
}

function test_input($data){
    $data = trim($data); //trim extra white spaces extra space, tab, newline)
    $data  = stripslashes($data); //Remove backslashes
    $data = htmlspecialchars($data); //function converts special characters to HTML entities. This means that it will 
    //replace HTML characters like < and > with &lt; and &gt;
    
    return $data;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>SWeets Nepal | Login</title>
	

  <link rel="stylesheet" type="text/css" href="check.css">
</head>
<body>

<?php require "templates/header.php"; ?>


<!------ Include the above in your HEAD tag ---------->

<form class="form-signin" >
  <div class="col-md-4">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Sweets Nepal</h1>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>

       <a href="register.php"> <p class="mt-5 mb-3 text-muted text-center" name="register">Register</p></a>
     Email us for more query :<a href="mailto:dedakiyajenish@gmail.com"> sweetsNepal@gmail.com </a>
       </div>
    </form>

</body>
</html>