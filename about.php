<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>About</title>
      <link rel="stylesheet" href="About.css">
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
               <li><a href="listedjobs.php">LIST</a></li>
                  <li><a href="user_homepage.php">HOME</a></li>
                  <li><a href="contact.php">CONTACT</a></li>
                  <li><a href="jobs.php">POST</a></li>
                  <li><a href="profile.php"><?php echo htmlspecialchars($name); ?></a></li>
               </ul>
            </div>
         </div>
         <div class="content">
            <h2 id="heading1">About Us</h2>
            <p class="paragraphs">ListingSite is a website designed to help graduates with finding employment.
               <br>We understand that it can be hard for people who are fresh out from college, most of them do not know where to start.
               <br>We as ListingSite are here to make things easier for them, now millions of graduates can find employment at the comfort of their own homes all thanks to our site.
            </p>
            <h2 id="heading2">This is our team</h2>
            <p>
               <div id="scroll-container">
                  <div id="scroll-text"><ul class="paragraphs2">
                     <li>Refentse Makgoba</li>
                     <li>Katleho Madaba</li>
                     <li>Junior Mabasa</li>
                     <li>Christivie Kalambay</li>
                     <li>Oscar Ramphisa</li>
                     <li>Sibalikhulu Dlamini</li>
                  </ul><div>
                </div>
              
               
            </p>
         </div>
      </div>
     <?php include('footer.php')?>
      <script src="app.js"></script>
   </body>
</html>
