<?php
session_start();
    error_reporting (E_ALL ^ E_NOTICE); //To ignore all notice errors

   include('connectdb.php');

   if(isset($_POST['register'])){

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $name = mysqli_real_escape_string($conn,$_POST["userName"]);
         $email = mysqli_real_escape_string($conn,$_POST["uEmail"]);
         $contact = mysqli_real_escape_string($conn,$_POST["contact"]);
         $password = mysqli_real_escape_string($conn,$_POST["pw"]);
         $comfirmPassword = mysqli_real_escape_string($conn,$_POST["pw2"]);

         if($password === $comfirmPassword){

            $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
               
            $query = "INSERT INTO registerusers (User_Fullname,User_Email,User_Contact,User_Password)
            VALUES ('$name','$email','$contact','$hashedpassword')";
         
            if(!mysqli_query($conn,$query)){
               echo "Error creating record <br>".mysqli_error($conn);
            }

            else{
               $_SESSION['name'] = $_POST['uEmail'];
               header("Location:user_homepage.php");
            }
         }
         else{
               echo "<script> alert('Passwords do not match. please enter matching passwords');</script>";
        }
      }
   }



 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Registration</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="registrationpage.css">
   </head>
   <body>
      <h2>Registration Form</h2>
      <div class="div1">
      <form name="myForm" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
         <div class="group">      
            <input type="text" name="userName" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Fullname</label>
         </div>
         <div class="group">      
            <input type="text"name="uEmail" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>E-mail</label>
         </div>
         <div class="group">      
            <input type="text"name="contact" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Contact</label>
         </div>
         <div class="group">      
            <input type="password" name="pw" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label> Password</label>
         </div>
         <div class="group">
            <input type="password" name="pw2" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Confirm Password</label>
            <input name='register' type="submit" value="Register" id="registor">
            <!-- <button id="registor"type="button" name="log" onclick="jobseeker_registerFunc()">Register</button> -->
            <p class="pReg">Already have an account?<a class="pReg" href="login.php">Login here</a></p>
            <!--<p class="pReg">Are you an employer?<a class="pReg" href="employer_registrationpage.html">Register here</a></p>-->
      </form>
      </div>
      <script src="app.js"></script>
   </body>
</html>
<?php

   //mysqli_close($conn);
?>
