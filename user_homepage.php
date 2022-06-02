<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="user_homepage.css">
      <title>Listing Site</title>
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
                  <li><a href="about.php">ABOUT</a></li>
                  <li><a href="contact.php">CONTACT</a></li>
                  <li><a href="jobs.php">POST</a></li>
                  <li><a href="profile.php"><?php echo htmlspecialchars($name); ?></a></li>
               
               </ul>
            </div>
         </div>
         <div class="home">
            <h1>WELCOME TO ListingSite</h1>
            <p>Are you graduated and you are looking for a job?</p>
            <p>Find jobs listed on our site!</p>
            <div class="jobs">
               <ul>
                  <li><a href="category1.php">ACCOUNTING & FINANCE</a></li>
                  <li><a href="category2.php">BUSINESS ANALIST</a></li>
                  <li><a href="category3.php">IT & ENGINEERING</a></li>
                  <li><a href="category4.php">HUMAN RESOURCES(HR)</a></li>
               </ul>
            </div>
         </div>
      </div>
      <?php include('footer.php')?>
      <script>
         var menuList= document.getElementById('menuList');
         menuList.style.maxHeight= "0px";
         function myMenu(){
            if( menuList.style.maxHeight== "0px"){
               menuList.style.maxHeight= "200px";
            }
            else{
               menuList.style.maxHeight= "0px";
            }
         }
      </script>
   </body>
</html>
