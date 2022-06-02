<?php 
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="dashboard.css">
      <title>Listing Site Dashboard</title>
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
                  <li><a href="homepage.php">HOME</a></li> 
                  <li><a href="list.php">LIST</a></li>
                  <li><a href="adminProfile.php"><?php echo htmlspecialchars($name); ?></a></li>

               </ul>
            </div>
         </div>

         <?php

            include("connectdb.php");

            $sql="SELECT User_FullName,User_Email,User_Contact FROM registerusers";

            $result= mysqli_query($conn, $sql );
            if(mysqli_num_rows($result) > 0){
               while($row= mysqli_fetch_assoc($result)){
                  ?>
                  <!-- <link rel="stylesheet" href="listedjobs.css"> -->
                  <table class="table"> 
                     <thead>
                        <tr>
                           <th>Full Name</th>
                           <th>Email</th>
                           <th>Contact</th>
                     </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th><?php echo $row['User_FullName'] ?></th>
                           <th><?php echo $row['User_Email'] ?></th>
                           <th><?php echo $row['User_Contact'] ?></th>
                        </tr>
                        
                  </tbody>
                  </table>
               

                  <script src="app.js"></script>
               
            <?php       
               }
            }
            else{
               echo "<h2 style='color:white;'>There aren't any users registered to this site.</h2>";
            } 

            ?> 

 
      </div>

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
      <?php include('footer.php')?>
   </body>
   
</html>
<?php

   mysqli_close($conn);
?>
