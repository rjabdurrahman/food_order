<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$userid=$_SESSION['fosuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
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
   <link href="css/register.css" rel="stylesheet">
   <link href="css/login.css" rel="stylesheet">
   <script type="text/javascript">
      function checkpass() {
         if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
            alert('New Password and Confirm Password field does not match');
            document.changepassword.confirmpassword.focus();
            return false;
         }
         return true;
      }
   </script>
   <style>
      .form-wrapper{
         background-color:white;
         position:relative;
         z-index:999999;
         max-width:700px;
         margin:0 auto;
         padding:20px;
      }
      
      input{color:#343434!important;}
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
               <div class="">
                  <!-- REGISTER -->
                  <div class="form-wrapper">
                     <div class="widget">
                        <div class="widget-body">
                           <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                           <form action="" name="changepassword" method="post" onsubmit="return checkpass();">
                              <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Current Password</label>
                                    <input type="password" name="currentpassword" id="currentpassword"
                                       class="form-control" required="true">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" class="form-control" id="newpassword" value=""
                                       name="newpassword" required="true">
                                 </div>

                              </div>
                              <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmpassword" value=""
                                       name="confirmpassword" required="true">
                                 </div>

                              </div>
                              <?php } ?>

                              <div class="form-bottom">
                                 <div class="">
                                    <button type="submit" name="submit" class="custom-btn"><i
                                          class="ft-user"></i>Change</button>
                                 </div>
                                 <div class="">
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- end: Widget -->
                     </div>
                     <!-- /REGISTER -->
                  </div>
                  <!-- WHY? -->

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
</body>

</html>