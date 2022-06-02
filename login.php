<?php
session_start();
include('connectdb.php');
error_reporting (E_ALL ^ E_NOTICE); //To ignore all notice errors
if(!$_SESSION['status']) {//tracking each user ip /session the correct way 
   $ip = $_SERVER['REMOTE_ADDR'];  
   $query = "INSERT INTO `user_hits` (`Id`, `IP`,`Date`) VALUES (NULL,'$ip',NULL)";
   $result = mysqli_query($conn,$query);
   // $_SESSION['status']=true;
   echo "<script> alert('Inserted')</script>";
}else{
   echo "<script> alert('no luck')</script>";
}

if(isset($_POST['submit'])){
   

   error_reporting (E_ALL ^ E_NOTICE); //To ignore all notice errors
   
   // if(isset($_POST['email']) && isset($_POST['password'])){}
   
      $email = mysqli_real_escape_string($conn,$_POST["email"]);
      $password = mysqli_real_escape_string($conn,$_POST["password"]);

      $query = "SELECT * FROM registerusers WHERE User_Email = '$email'";

      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) > 0){

         $row = mysqli_fetch_array($result);
         $hash = $row['User_Password'];

         if(password_verify($password,$hash)){
            $_SESSION['name'] = $_POST['email'];
            header('Location:user_homepage.php');
            die;
            // echo "You have Logged in";
         }

      }

      $email = mysqli_real_escape_string($conn,$_POST["email"]);
      $password1 = mysqli_real_escape_string($conn,$_POST["password"]);

      $query = "SELECT User_Email,User_Password FROM adminaccount WHERE User_Email = '$email' AND User_Password = '$password1'";

      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) > 0){
         $_SESSION['name'] = $_POST['email'];
         header('Location:homepage.php');
         die;
         // echo "You have Logged in";

      }

     
      else{
         echo "<script> alert('You have entered incorrect email/password.')</script>";
      }


}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Log In</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="login.css">
   </head>
   <body>
      <div class="session">
         <div class="left">
         </div>
         <form action="login.php" method="post" class="log-in" name="myForm" autocomplete="off">
            <h4>Listing<span>Site</span></h4>
            <p>Welcome To ListingSite:</p>
            <div class="floating-label">
               <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
               <label for="email">Email:</label>
            </div>
            <div class="floating-label">
               <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
               <label for="password">Password:</label>
            </div>
            <input type="submit" name='submit' value="Log in" id="logIn">
            <!-- <button id=logIn onclick="login()">Log in</button> -->
            <p class="pReg">Don't have an account yet?<a class="pReg" href="registrationpage.php">Register here</a></p>
            <p class="pReg">Forgot Password?<a class="pReg" href="forgotPass.php">Reset Password</a></p>
         </form>
      </div>
      <script src="app.js"></script>
   </body>
</html>

 