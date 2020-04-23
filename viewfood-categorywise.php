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

    <!-- animation css -->
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<link href="css/food-menu.css" rel="stylesheet">

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <?php include_once('includes/header.php');?>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <section class="restaurants-page">
                <div class="menu-wrapper">
                    <div class="side-menu">
                        <div class="menu-img">
                            <img src="images/food.jpg" alt="food">
                        </div>
                        <div class="sidebar">
                            <form name="search" method="post" action="search-food.php">
                                <div class="main-block">

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search your favorite food"
                                            name="searchdata" id="searchdata">
                                    </div>
                                </div>
                            </form>



                            <div class="main-block">
                                <div class="sidebar-title">
                                    <h6>Food Categories</h6> <i class="fas fa-utensils"></i>
                                </div>
                                <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>



                                <ul class="categories">

                                    <li>
                                        <label class="custom-control custom-checkbox">
                                            <span class="custom-control-description"><a
                                                    href="viewfood-categorywise.php?catid=<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></a></span>
                                        </label>
                                    </li>


                                </ul>
                                <?php } ?>

                            </div>

                        </div>

                        <!-- end:Pricing widget -->

                        <!-- end:Widget -->
                    </div>
                    <div class="items">
                        <div class="items-wrapper">
                            <!-- Each popular food item starts -->
                            <?php
 $cid=$_GET['catid'];
$ret=mysqli_query($con,"select * from tblfood where CategoryName='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <div class="food-item">
                                <div class="food-item-wrap">
                                    <div class="food-img"> <img src="admin/itemimages/<?php echo $row['Image'];?>"
                                            width="300" height="180">


                                        <span class="price">Rs.<?php echo $row['ItemPrice'];?></span>
                                    </div>
                                    <div class="content">
                                        <h5><a
                                                href="food-detail.php?fid=<?php echo $row['ID'];?>"><?php echo $row['ItemName'];?></a>
                                        </h5>
                                        <div class="product-name"><?php echo substr($row['ItemDes'],0,30);?>
                                        </div>
                                        <div class="price-btn-block">

                                            <?php if($_SESSION['fosuid']==""){?>
                                            <a href="login.php" class="custom-btn">Order
                                                Now</a>
                                            <?php } else {?>
                                            <form method="post">
                                                <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>">
                                                <button type="submit" name="submit" class="custom-btn">Order
                                                    Now</button>
                                            </form>
                                            <?php }?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php } ?>

                            <!-- Each popular food item starts -->
                        </div>
                        <!-- end:right row -->
                        <div class="pagination-section">
                            <nav aria-label="...">


                                <ul class="pagination">
                                    <li class="page-link"><a href="?pageno=1">First</a></li>
                                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-link">
                                        <a
                                            href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                                    </li>
                                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-link">
                                        <a
                                            href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                                    </li>
                                    <li class="page-link"><a href="?pageno=<?php echo $total_pages; ?>">Last</a>
                                    </li>
                                </ul>


                            </nav>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>

    <!-- start: FOOTER -->
    <?php include_once('includes/footer.php');?>
    <!-- end:Footer -->
    </div>
    <!-- end:page wrapper -->
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