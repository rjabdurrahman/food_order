<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['fosuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Invalid Credentials.";
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

   <!-- animation css -->
   <link href="css/animsition.min.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/register.css" rel="stylesheet">
   <link href="css/login.css" rel="stylesheet">
</head>

<body>
   <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <!--header starts-->
      <header id="header" class="header-scroll top-header headrom">
         <!-- .navbar -->
         <?php include('includes/header.php');?>
         <!-- /.navbar -->

      </header>
      <div class="page">
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
                           <form action="" name="login" method="post" class="login-form">
                              <div class="">
                                 <div class="form-bind">
                                    <i class="fas fa-user"></i>
                                    <label>Registered Email or Contact Number</label>
                                    <input type="text" name="emailcont" id="email" class="form-control"
                                       placeholder="Registered Email or Contact Number" required="true">
                                 </div>
                              </div>
                              <div class="">
                                 <div class="form-bind">
                                    <i class="fas fa-lock"></i>
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" value="" name="password"
                                       required="true" placeholder="Password">
                                    <h6 style="padding-top: 20px"><a href="forgot-password.php">Forgot Password?</a>
                                    </h6>
                                 </div>

                              </div>

                              <div class="form-bottom">
                                 <div class="">
                                    <button type="submit" name="login" class="custom-btn"><i
                                          class="ft-user"></i>Login</button>
                                 </div>
                                 <div class="">
                                    <a href="registration.php" class=""><i class="ft-user"></i>Register</a>

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
                     <h4>Registration is fast, easy, and free.</h4>
                     <hr>
                     <img src="images/login.jpg" alt="" class="img-fluid">


                     <!-- end:Panel -->
                     <h4 class="m-t-20">Contact Customer Support</h4>
                     <p> If you"re looking for more help or have a question to ask, please </p>
                     <p> <a href="contact.php" class="custom-btn" style="color:white; display:inline-block">contact us</a> </p>
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

   <!-- core JavaScript
    ================================================== -->
   <script src="js/jquery.min.js"></script>
   <script src="js/tether.min.js"></script>
   <script src="js/animsition.min.js"></script>
   <script src="js/jquery.isotope.min.js"></script>
   <script src="js/headroom.js"></script>
   <script src="js/foodpicky.min.js"></script>

   <!-- font Awesome Icon Script -->
   <script src="https://kit.fontawesome.com/bdb42816d8.js" crossorigin="anonymous"></script>
</body>

</html>