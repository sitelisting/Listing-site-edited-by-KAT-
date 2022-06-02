<?php
include('session.php')
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Application Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="application.css">
   </head>
   <body>
      <div class="main">
         <div class="navbar">
            <img src="list.png" class="menu-icon" onclick="myMenu()">
            <div class="icon">
               
               <h1 class="logo">ListingSite</h1>
            </div>
            <div class="menu">
               
               <ul id="menuList">
                  <li><a href="user_homepage.php">HOME</a></li>
                  <li><a href="listedjobs.php">LIST</a></li>  
                 <li><a href="profile.php"><?php echo htmlspecialchars($name); ?></a></li>
                  <li>
                     <a href="contact.php">CONTACT</a>
                  </li>
               </ul>
            </div>
         </div>
      <h2>Application Form</h2>
      <div class="div1">
      <form name="myForm" method="post">
         <div class="group">      
            <input type="text" name="fName" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Full name</label>
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
         <p style="font-family:'Roboto'; font-size: 18px;"><b>Upload your CV and skills</b></p>
         <div class="group">      
            <input type="file" name="skills" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label></label>
         </div>
         <div>
            <button id="apply" name="submit" >Apply</button>
         </div>
      </form>
      </div>
      <script src="app.js"></script>
   </body>
</html>
<?php

if(isset($_POST['submit'])){
   $to = 'listingsite13@gmail.com';
   $fullname = $_POST['fName'];
   $email = $_POST['uEmail'];
   $subject =  'Job Application';
   $contact = $_POST['contact'];
   $resume = $_POST['skills'];
   $message_body = "User Name: $fullname\n" ."User Email: $email\n". "User Contact: $contact\n"."User Resume: $resume\n";
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
