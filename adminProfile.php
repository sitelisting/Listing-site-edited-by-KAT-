<?php 
include('session.php');
include('connectdb.php');


if(isset($_POST['update'])){
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $confirmPassword = mysqli_real_escape_string($conn,$_POST['cNfrmpassword']);

   if($password === $confirmPassword){

      $sql = "UPDATE adminaccount SET User_Email = '$email',User_Password = '$password' WHERE User_Email ='{$_SESSION["name"]}'";
      
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
                  <li><a href="list.php">LIST</a></li>  
                 <li><a href="dashboard.php">DASHBOARD</a></li>
                  <li><a href="adminProfile.php"><?php echo htmlspecialchars($name); ?></a></li>
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
               
               $sql = "SELECT * FROM adminaccount WHERE User_Email = '{$_SESSION['name']}'";
               $result = mysqli_query($conn,$sql);
               if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_assoc($result)){
                     ?>
                     

                  <div class="group">
                  <br><input type="text" name='email' value='<?php echo $row['User_Email'] ?>'>
                     <span class="highlight">
                     </span>
                     <span class="bar">
                     </span>
                     <label>E-mail</label>
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
                     <?php 
                     
                  }
               }
               ?>
               <div>
                  <button name='update' id="btn-update">Update</button>
               </div>
               <div>
                  <button name='logout' id="btn-logout" onclick="logout()">Log Out</button>
               </div>
               <div>
                  <button name='delete' id="btn-delete" onclick="logout()">Delete Account</button>
               </div>
            </form>
      </div>
      </div>
      <?php include('footer.php')?>
      <script src="app.js"></script>
   </body>
</html>
