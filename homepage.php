<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="homepage.css">
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
                  <li><a href="list.php">LIST</a></li>  
                 <li><a href="dashboard.php">DASHBOARD</a></li>
                  <li><a href="adminProfile.php"><?php echo htmlspecialchars($name); ?></a></li>
               </ul>
            </div>
         </div>
         <div class="home">
            <h1>WELCOME TO ListingSite</h1>
            <p>Are you graduated and you are looking for a job?</p>
            <p>Find jobs listed on our site!</p>
            <div class="jobs">
               <ul>
                  <li><a href="">ACCOUNTING & FINANCE</a></li>
                  <li><a href="">BUSINESS ANALIST</a></li>
                  <li><a href="">IT & ENGINEERING</a></li>
                  <li><a href="">HUMAN RESSOURCES(HR)</a></li>
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
