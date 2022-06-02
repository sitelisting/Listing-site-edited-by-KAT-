<?php 
include('session.php');
include('connectdb.php');


if(isset($_POST['update'])){
   $fullName = mysqli_real_escape_string($conn,$_POST['fullname']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $contact = mysqli_real_escape_string($conn,$_POST['contact']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $confirmPassword = mysqli_real_escape_string($conn,$_POST['cNfrmpassword']);

   if(isset($_POST['check'])){
      if($password === $confirmPassword){

         $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
   
         $sql = "UPDATE registerusers SET User_FullName ='$fullName' ,User_Email = '$email',User_Contact = '$contact',User_Password = '$hashedpassword' WHERE User_Email ='{$_SESSION["name"]}'";
         
         $result = mysqli_query($conn,$sql);
         if($result){
            echo "<script> alert('Profile details updated successfully') </script>";
            $_SESSION["name"] = $email;
         }else{
            echo "<script> alert('Profile couldn't be updated')</script>";
            echo mysqli_connect_error();
         }
      
      
      }
   
      else{
         echo "<script> alert('Passwords do not match. please enter matching passwords');</script>";
         echo mysqli_connect_error();
      }

   }
   else{
      $sql = "UPDATE registerusers SET User_FullName ='$fullName' ,User_Email = '$email',User_Contact = '$contact' WHERE User_Email ='{$_SESSION["name"]}'";
         
      $result = mysqli_query($conn,$sql);
      if($result){
         echo "<script> alert('Profile details updated successfully') </script>";
         $_SESSION["name"] = $email;
      }else{
         echo "<script> alert('Profile couldn't be updated')</script>";
         echo mysqli_connect_error();
      }
   }
}

if(isset($_POST['logout'])){
   unset($_SESSION['name']);
   session_destroy();
   header("Location:login.php");
}

if(isset($_POST['delete'])){
   $sql = "DELETE FROM registerusers  WHERE User_Email ='{$_SESSION["name"]}'";
   $result = mysqli_query($conn,$sql);
  
   if($result ){
      unset($_SESSION['name']);
      session_destroy();
      header("Location:login.php");
   }else{
      echo "<script> alert('Account couldn't be deleted')</script>";
      echo mysqli_connect_error();
   }
   
}


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
      <link rel="stylesheet" href="profile.css">
   </head>
   <body>
      <div class="main">
         <div class="navbar">
            <div class="icon">
               <h1 class="logo">ListingSite</h1>
            </div>
            <img src="list.png" class="menu-icon" onclick="myMenu()">
            <div class="menu">
               <ul id="menuList">
                  <li><a href="listedjobs.php">LIST</a></li>  
                  <li><a href="user_homepage.php">HOME</a></li>
                  <li><a href="about.php">ABOUT</a></li>
                  <li><a href="contact.php">CONTACT</a></li>
                  <li><a href="jobs.php">POST</a></li>
               </ul>
            </div>
         </div>
         <h2>
            <div id='Heading1'>
               <h1>Welcome To Your Profile Page</h1>
            </div>
         </h2>
         <span class="container">
            <form method="post">
               
               <?php  
               
               $sql = "SELECT * FROM registerusers WHERE User_Email = '{$_SESSION['name']}'";
               $result = mysqli_query($conn,$sql);
               if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_assoc($result)){
                     ?>
                     
                  <div class="group">
                     <br><input type="text" name ='fullname' value='<?php echo $row['User_FullName'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label> Full Name</label>
                  </div>
                  <div class="group">
                  <br><input type="text" name='email' value='<?php echo $row['User_Email'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>E-mail</label>
                  </div>
                  <div class="group">
                  <br><input type="text" name='contact' value='<?php echo $row['User_Contact'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>Contact Number</label>
                  </div>
                  <div class="group">
                  <br><input type="password" name='password' value='<?php echo $row['User_Password'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>Password</label>
                  </div>
                  <div class="group">
                  <br><input type="password" name='cNfrmpassword' value='<?php echo $row['User_Password'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>Confirm Password</label>
                  </div>
                  <div class="group">
                  <br><input type="checkbox" name='check'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>Check to update Password</label>
                  </div>
                 
                  
                  
                     <?php 
                     
                  }
               }
               ?>
               <div>
                  <button name='update' id="btn-update">Update</button><button name='logout' id="btn-logout" onclick="logout()">Log Out</button>
               </div>
               <div>
                  <button name='delete' id="btn-delete" onclick="logout()">Delete Account</button>
               </div>
            </form>
      </div>
      </div>
      </span>
      <footer id="footer">
         <p>
         <h3>Useful links:</h3>
         </p>
         <a href="about.php"><b>About Us </b></a><br>
         <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
         <a href="contact.php"> <b>Contact Us </b></a>
         </p>
         <p id="follow">Follow us !</p>
         <!-- social media links -->
         <div class="Sicon">
         <a class="social-icon" href="https://twitter.com/listingsite13">
            <ion-icon name="logo-twitter">
            </ion-icon>
         </a>
         <a class="social-icon" href="https://instagram.com/ListingSite">
            <ion-icon name="logo-instagram">
            </ion-icon>
         </a>
         <a class="social-icon" href="https://facebook.com/ListingSite">
            <ion-icon name="logo-facebook">
            </ion-icon>
         </a>
         <a class="social-icon" href="https://github.com/sitelisting/Listing_Site">
            <ion-icon name="logo-github"></ion-icon>
         </a>
      </div>
      </footer>
      <script src="app.js"></script>
   </body>
</html>
