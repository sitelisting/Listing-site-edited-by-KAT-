<?php
include('session.php');
  include('connectdb.php');

if(isset($_POST['submit'])){
 //connection with sql
//  $con= mysqli_connect("localhost", "root", "", "listingsite");
// //getting employer inputs
  $job_category= mysqli_real_escape_string($conn, $_POST['job_category']);
  $company_name= mysqli_real_escape_string($conn, $_POST['company_name']);
  $position= mysqli_real_escape_string($conn, $_POST['position']);
  $link= mysqli_real_escape_string($conn, $_POST['link']);
  $company_email= mysqli_real_escape_string($conn, $_POST['company_email']);
  $contact_number= mysqli_real_escape_string($conn, $_POST['contact_number']);

   //sql syntax
$sql="INSERT INTO createjobs (Job_Category, Company_Name, Job_Position, Company_Email, Company_Number, Job_Link )
VALUES ('$job_category','$company_name','$position','$company_email','$contact_number','$link')";

$result= mysqli_query($conn, $sql );

//redirect web page using header function
// header('Location: jobs.php');
// exit();
echo "<script> alert('Job Posted successfully') </script>";

} 


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Create Jobs</title>
      <link rel="stylesheet" href="jobsStyle.css">
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
                  <li><a href="contact.php">CONTACT</a></li>
               <li><a href="profile.php"><?php echo htmlspecialchars($name); ?></a></li>

               </ul>
            </div>
         </div>
         <h2>
            <div id='Heading1'>
               <h1>Post a job</h1>
            </div>
         </h2>
         <span class="container">
            <form method="post" action="jobs.php">
               <div class="group">
                  <input type="text" name="job_category" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Job Category</label>
               </div>
               <div class="group">
                  <input type="text" name="company_name" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Company Name</label>
               </div>
               <div class="group">
                  <input type="type" name="position" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Position</label>
               </div>
               <div class="group">
                  <input type="email" name="company_email" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Company E-mail</label>
               </div>
               <div class="group">
                  <input type="text" name="contact_number" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Contact Number</label>
               </div>
               <div class="group">
                  <input type="text" name="link" required>
                  <span class="highlight">
                  </span>
                  <span class="bar">
                  </span>
                  <label>Job Link</label>
               </div>
               <div>
                  <button id="btn-post" name="submit">Post Job</button>
               </div>
              
            </form>
      
      </div>
      </div>
      <?php include('footer.php')?>
      <script src="app.js"></script>
   </body>
</html>
