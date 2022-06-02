<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact</title>
      <link rel="stylesheet" href="Contact.css">
   </head>
   <body>
      <div class="main">
      <div class="navbar">
         <div class="icon">
            <h1 class="logo">ListingSite</h1>
           
         </div>
         <div class="menu">
            <img src="list.png" class="menu-icon" onclick="myMenu()">
            <ul id="menuList">
               <li><a href="listedjobs.php">LIST</a></li> 
               <li><a href="user_homepage.php">HOME</a></li>
               <li><a href="about.php">ABOUT</a></li>
               <li><a href="jobs.php">POST</a></li>
               <li><a href="profile.php"><?php echo htmlspecialchars($name); ?></a></li>
            </ul>
         </div>
      </div>
      <h2>Contact Us</h2>
      <div id="middleHeading">
         <h3>We are always pleased to hear more from you.<br>
            If you have any queries or comments use informations below.
         </h3>
      </div>
      <br id="lastHeading">
      <h2>Contact Information</h2>
      <p class="paragraphs">
         <b>Location</b>: Johanessburg, Gauteng, South Africa<br><br>
         <b>Email</b>:<a href="mailto: listingsite13@gmail.com"> listingsite13@gmail.com </a><br><br>
         <b>Call</b>: 011-889-5584
      </p>
      <div class="box">
      <form action='contact.php' method='post'>
         <h1 id="headingOne">Send Us An E-mail</h1>
         <span class="container">
      <form>    
      <div class="group">      
      <input type="text" name='fullname' required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>FullName</label>
      </div>
      <div class="group">      
      <input type="text" name='email' required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
      </div>
      <div class="group">      
      <input type="text" name='Subject' required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Subject of Query</label>
      </div>
      <div class="group">
         <textarea name="message" id="" cols="41.75" rows="5" ></textarea>
         <span class="highlight"></span>
         <span class="bar"></span>
         <label for="">Message</label>
      </div>
      <div>
      <button type="submit" name='submit'  id="bnt-submit">Submit</button>
      </div>
      </span>
      </form>
      <?php include('footer.php')?>
  
      <script src="app.js"></script>
   </body>
</html>
<?php

if(isset($_POST['submit'])){
   $to = 'listingsite13@gmail.com';
   $fullname = $_POST['fullname'];
   $email = $_POST['email'];
   $subject =  $_POST['Subject'];
   $message = $_POST['message'];
   $message_body = "User Name: $fullname\n" ."User Email: $email\n". "User Message: $message\n";
   $headers = "From:listingsite13@gmail.com\r\n Reply-To: listingsite13@gmail.com";
   $mail_sent = mail($to,$subject,$message_body,$headers);
   if($mail_sent == true){
      echo "<script> alert('Message Sent') </script>";
   }else{
      echo "'Message not Sent') ";
      print_r(error_get_last());
   }
}

?>
