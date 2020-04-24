<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
$foodid=$_POST['foodid'];
$userid= $_SESSION['fosuid'];
$query=mysqli_query($con,"insert into tblorders(UserId,FoodId) values('$userid','$foodid') ");
if($query)
{
 echo "<script>alert('Food has been added in to the cart');</script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
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
    <title>Food Ordering System</title>
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/order.css" rel="stylesheet">
    <link href="css/order-detail.css" rel="stylesheet">
    <link href="css/food-details.css" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <?php include_once('includes/header.php');?>
            <!-- /.navbar -->
        </header>
        <div>

            <!-- start: Inner page hero -->
            <?php
 $cid=$_GET['fid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <section class="inner-page-hero bg-image" data-image-src="images/decouvrez-l-experience-food-d-airbnb.jpg">
                <div class="profile">
                    <div class="container">
                        <div class="profile-row">
                            <div class="profile-img">
                                <div class="image-wrap">

                                    <figure><img src="admin/itemimages/<?php echo $row['Image'];?>" width="200"
                                            height="100"></figure>
                                </div>
                            </div>
                            <div class="profile-desc">
                                <div class="pull-left">
                                    <h6><a href="#"><?php echo $row['ItemName'];?></a></h6>
                                    <ul class="nav nav-inline">
                                        <li class="nav-item ratings">
                                            <a class="nav-link" href="#"> <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- end:Inner page hero -->

            <div class="container">
                <div class="order-row">

                    <div class="mid-menu">
                        <div class="menu-widget">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    <?php echo $row['ItemName'];?> <a class="" href="#popular">
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>
                                </h3>

                            </div>
                            <div class="order-collapse" id="1">

                                <!-- end:Food item -->

                                <!-- end:Food item -->

                                <!-- end:Food item -->

                                <div class="order-items">
                                    <div class="rest-logo pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img
                                                src="admin/itemimages/<?php echo $row['Image'];?>" width="200"
                                                height="100"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#"><?php echo $row['ItemName'];?></a></h6>
                                        <p> <?php echo $row['ItemDes'];?></p>
                                    </div>
                                    <!-- end:Description -->
                                </div>

                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->

                        <!-- end:Widget menu -->

                        <!--/row -->
                    </div>
                    <!-- end:Bar -->
                    <div class="order-sidebar">
                        <div class="sidebar-wrap">
                            <div class="widget widget-cart">

                                <!-- end:Order row -->

                                <div class="widget-body">
                                    <div class="price-wrap">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong>Rs.<?php echo $row['ItemPrice'];?></strong></h3>
                                        <p>Free Shipping</p>
                                        <?php if($_SESSION['fosuid']==""){?>
                                        <a href="login.php" class="custom-btn">Order Now</a>
                                        <?php } else {?>
                                        <form method="post">
                                            <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>">
                                            <button type="submit" name="submit" class="custom-btn">Order Now</button>
                                        </form>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }  ?>
                </div>
                <!-- end:row -->
            </div>
            <!-- end:Container -->

            <!-- start: FOOTER -->
            <?php include_once('includes/footer.php');?>
            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
    </div>
    <!--/end:Site wrapper -->
    <!-- Modal -->

    <!-- core JavaScript
    ================================================== -->
    <!-- font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/bdb42816d8.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>

    <script src="js/animsition.min.js"></script>

    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>