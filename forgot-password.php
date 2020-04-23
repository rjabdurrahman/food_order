<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="#">
   <title>Food Ordering Managment System</title>
   <link href="css/animsition.min.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet">
</head>
<link href="css/register.css" rel="stylesheet">

<body>
   <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <!--header starts-->
      <header id="header" class="header-scroll top-header headrom">
         <!-- .navbar -->
         <?php include('includes/header.php');?>
         <!-- /.navbar -->

      </header>
      <div class="page-wrapper">

         <section class="contact-page inner-page">
            <div class="container">
               <div class="main-wrapper">
                  <!-- REGISTER -->
                  <div class="form-wrapper">
                     <div class="widget">
                        <div class="widget-body">
                           <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                           <form action="" name="submit" method="post">
                              <h3 style="color:white; margin-bottom:20px">Reset your password</h3>
                              <div class="row">
                                 <div class="form-bind">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required="true">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-bind">
                                    <i class="fas fa-phone-alt"></i>
                                    <input type="text" class="form-control" required="true" name="contactno"
                                       maxlength="10" pattern="[0-9]{10}" placeholder="Enter your phone">

                                 </div>

                              </div>

                              <div class="form-bottom">
                                 <div class="">
                                    <button type="submit" name="submit" class="custom-btn"><i
                                          class="ft-user"></i>Reset</button>

                                 </div>
                                 <div class="">
                                    <a href="login.php" class="" style="color:white"><i class="ft-user"></i>Sign In</a>

                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- end: Widget -->
                     </div>
                     <!-- /REGISTER -->
                  </div>
                  <!-- WHY? -->
                  <div class="side-wrapper">
                     <h4 class="section-title">Registration is fast, easy, and free.</h4>
                     <hr>
                     <img src="images/login.jpg" alt="" class="img-fluid">
                     <!-- end:Panel -->
                     <h4 class="m-t-20">Contact Customer Support</h4>
                     <p> If you"re looking for more help or have a question to ask, please </p>
                     <p> <a href="contact.php" class="custom-btn"
                           style="display:inline-block; margin-bottom:15px">contact us</a> </p>
                  </div>
                  <!-- /WHY? -->
               </div>
            </div>
         </section>

         <!-- start: FOOTER -->
         <?php include('includes/footer.php');?>
         <!-- end:Footer -->
      </div>
      <!-- end:page wrapper -->
   </div>
   <!--/end:Site wrapper -->
   <!-- Bootstrap core JavaScript
    ================================================== -->
   <script src="js/jquery.min.js"></script>
   <!-- font Awesome Icon Script -->
   <script src="https://kit.fontawesome.com/bdb42816d8.js" crossorigin="anonymous"></script>
   <script src="js/tether.min.js"></script>
   <script src="js/animsition.min.js"></script>
   <script src="js/jquery.isotope.min.js"></script>
   <script src="js/headroom.js"></script>
   <script src="js/foodpicky.min.js"></script>
</body>

</html>