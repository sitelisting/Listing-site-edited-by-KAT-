<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE); //To ignore all notice errors
if(isset($_POST['submit'])){
   
    include('connectdb.php');

      $email = mysqli_real_escape_string($conn,$_POST["email"]);
      $password = mysqli_real_escape_string($conn,$_POST["password"]);
      $password1 = mysqli_real_escape_string($conn,$_POST["password1"]);

      if($password1 == $password){

      $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
        $query = "UPDATE registerusers SET User_Password='$hashedpassword' WHERE User_Email = '$email'";

        $result = mysqli_query($conn,$query);
  
        if($result){
           header('Location:login.php');
           die;
        }
      }else {
          echo "<script> alert('Passwords dont match.')</script>";
          die;
      }


}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forgot Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="login.css">
   </head>
   <body>
      <div class="session">
         <div class="left">
         </div>
         <form action="forgotPass.php" method="post" class="log-in" name="myForm" autocomplete="off">
            <h4>Listing<span>Site</span></h4>
            <p>Reset Your Password</p>
            <div class="floating-label">
               <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
               <label for="email">Email:</label>
            </div>
            <div class="floating-label">
               <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
               <label for="password">Password:</label>
            </div>
            <div class="floating-label">
               <input placeholder="Confirm Password" type="password" name="password1" id="password" autocomplete="off">
               <label for="password">Confirm Password:</label>
            </div>
            <input type="submit" name='submit' value="Reset" id="logIn">
            <p class="pReg">Don't have an account yet?<a class="pReg" href="registrationpage.php">Register here</a></p>
         </form>
      </div>
      <script src="app.js"></script>
   </body>
</html>
