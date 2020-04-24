 <?php if(isset($_SESSION['fosuid'])): ?>
 <div class="message-box">
    <p class="body-head">Message</p>
    <div class="msg-body">
       <p class="chat-with">You are connected to admin</p>
       <div class="inbox">

       </div>
       <div class="msg-footer">
          
             <input type="text" placeholder="Type your message..." id="msg">
             <input type="hidden" id="sender" value="<?php if(isset($_SESSION['fosuid'])){ echo $_SESSION['fosuid']; }?>">
         
       </div>
    </div>
 </div>
 <?php endif ?>
 
 <footer class="footer">
    <div class="container">
       <!-- top footer statrs -->
       <div class="top-footer">
          <div class="footer-widgets">
             <a href="index.php" class="logo"> Food Ordering System </a><br /> <span>Order Delivery </span>
          </div>
          <div class="footer-widgets">
             <h5>About Us</h5>
             <ul>
                <li><a href="about-us.php">About us</a> </li>
                <li><a href="contact.php">Contact us</a> </li>
             </ul>
          </div>
          <div class="footer-widgets">
             <h5>My Account</h5>
             <ul>
                <li><a href="#">My Profile</a> </li>
                <li><a href="#">My Cart</a> </li>
                <li><a href="#">My Order</a> </li>
             </ul>
          </div>
          <div class="footer-widgets">
             <h5>Track Order </h5>
             <ul>
                <li><a href="track-order-on.php">Track Order </a> </li>
             </ul>
          </div>


          <div class="footer-widgets">
             <h5>Admin </h5>
             <ul>
                <li><a href="admin" target="_blank">Login </a> </li>
             </ul>
          </div>


       </div>
       <!-- top footer ends -->

       <!-- bottom footer ends -->
    </div>
 </footer>
