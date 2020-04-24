<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
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

</head>

<body>
   <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <!--header starts-->
      <header id="header" class="header-scroll top-header headrom">
         <!-- .navbar -->
         <?php include('includes/header.php');?>
         <!-- /.navbar -->
         <script type="text/javascript">
            function checkpass() {
               if (document.signup.password.value != document.signup.repeatpassword.value) {
                  alert('Password and Repeat Password field does not match');
                  document.signup.repeatpassword.focus();
                  return false;
               }
               return true;
            }
         </script>

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
                           <form action="" name="signup" method="post" onsubmit="return checkpass();">
                              <div class="row">
                                 <div class="form-bind">
                                    <i class="fas fa-user"></i>
                                    <input class="form-control" type="text" value="" id="firstname" name="firstname"
                                       required="true" placeholder="Firstname">
                                 </div>
                                 <div class="form-bind">
                                    <i class="fas fa-user"></i>
                                    <input class="form-control" type="text" value="" id="lastname" name="lastname"
                                       required="true" placeholder="Lastname">
                                 </div>
                                 <div class="form-bind">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                       name="email" required="true" placeholder="Your email">
                                 </div>
                                 <div class="form-bind">
                                    <i class="fas fa-phone-alt"></i>
                                    <input class="form-control" type="text" value="" id="mobilenumber"
                                       name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}"
                                       placeholder="Your phone">
                                 </div>
                                 <div class="form-bind">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" class="form-control" id="password" value="" name="password"
                                       required="true" required="true" placeholder="Password">
                                 </div>
                                 <div class="form-bind">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" class="form-control" id="repeatpassword" value=""
                                       name="repeatpassword" required="true" placeholder="Confirm Password">
                                 </div>
                              </div>

                              <div class="form-bottom">
                                 <div class="">
                                    <button type="submit" name="submit" class="custom-btn"><i class="ft-user"></i>
                                       Register</button>
                                 </div>
                                 <div class="">
                                    <a href="login.php" class="login"><i class="ft-user"></i> Login</a>

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
                     <img src="images/burger.png" alt="" class="img-fluid">


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
   <!-- Bootstrap core JavaScript
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