<footer id="footer">  <?php 
          include("connectdb.php");
          $query = "SELECT  COUNT(IP) as num FROM user_hits"; 
          $result=mysqli_query($conn,$query);
          $row = mysqli_fetch_array($result);
          ?>
<h4>Unique Visitors: <?php echo $row["num"] ?></h4>
         <p>
         <h3>Useful links: </h3>
         </p>
         <br>
         <a href="contact.php">Contact Us</a>
         </p>
         <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
         <p id="follow">Follow us !</p>
         <!-- social media links -->
         <div class="Sicon"> 
         <a class="social-icon" href="https://instagram.com/ListingSite">
            <ion-icon name="logo-twitter">
            </ion-icon>
         </a>
         <a class="social-icon" href="https://instagram.com/listingsite13">
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