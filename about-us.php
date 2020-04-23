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
    $msg="Invalid Details.";
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
   <style>
      .main-wrapper {
         display: flex;
         justify-content: space-between;
         align-items: center;
      }

      .left-side .right-side {
         flex-basis: 50%;
      }

      .left-side {
         padding: 40px 50px 40px 20px;
         background: var(--bg-secondary);
         clip-path: polygon(0 1%, 100% 0%, 90% 100%, 0% 100%);
         text-align: left;
      }

      .left-side p {
         color: white;
         margin-top: 15px;
         font-size: 13px;
      }
   </style>
</head>

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
                  <div class="left-side">
                     <div class="widget">
                        <div class="widget-body">
                           <div class="row">
                              <div class="form-group col-sm-12">
                                 <h3 align="center">About us</h3>

                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>

                              </div>
                              <!-- end: Widget -->
                           </div>
                           <!-- /REGISTER -->
                        </div>
                     </div>
                  </div>
                  <!-- WHY? -->
                  <div class="right-side">

                     <img src="images/about-us.jpg" alt="" class="img-fluid">

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
   <script src="js/tether.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/animsition.min.js"></script>
   <script src="js/bootstrap-slider.min.js"></script>
   <script src="js/jquery.isotope.min.js"></script>
   <script src="js/headroom.js"></script>
   <script src="js/foodpicky.min.js"></script>
</body>

</html>