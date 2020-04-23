<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{ 
//placing order

if(isset($_POST['placeorder'])){
//getting address
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$userid=$_SESSION['fosuid'];
//genrating order number
$orderno= mt_rand(100000000, 999999999);
$query="update tblorders set OrderNumber='$orderno',IsOrderPlaced='1' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-order.php'</script>";

}
}   

//Code deletion
if(isset($_GET['delid'])) {
$rid=$_GET['delid'];
$query=mysqli_query($con,"delete from tblorders where ID='$rid'");
echo '<script>alert("Food item deleted")</script>';
echo "<script>window.location.href='cart.php'</script>";

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
<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/order.css" rel="stylesheet">
    <link href="css/order-detail.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
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

            <div class="container">
                <div class="order-row">
                    <div class="menu">
                        <div class="sidebar">
                            <div class="main-block">
                                <div class="sidebar-title">
                                    <h6>Food Categories</h6> <i class="fa fa-cutlery pull-right"></i>
                                </div>
                                <ul id="food-menu">
                                    <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>



                                    <li>
                                        <label class="custom-control custom-checkbox">
                                            <span class="custom-control-description"><a
                                                    href="viewfood-categorywise.php?catid=<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></a></span>
                                        </label>
                                    </li>



                                    <?php } ?>
                                </ul>

                            </div>
                            <!-- end:Sidebar nav -->

                        </div>
                        <!-- end:Left Sidebar -->

                    </div>
                    <div class="mid-menu">
                        <div class="menu-widget">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Your ORDERS Delicious hot food! <a class="btn btn-link pull-right" href="#popular">

                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>
                                </h3>

                            </div>
                            <div class="order-collapse" id="1">

                                <?php 
$userid= $_SESSION['fosuid'];
$query=mysqli_query($con,"select tblorders.ID as frid,tblfood.Image,tblfood.ItemName,tblfood.ItemDes,tblfood.ItemPrice,tblfood.ItemQty,tblorders.FoodId from tblorders join tblfood on tblfood.ID=tblorders.FoodId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>

                                <div class="order-items">
                                    <div class="order-content">
                                        <div class="rest-logo pull-left">
                                            <a class="restaurant-logo pull-left" href="#"><img
                                                    src="admin/itemimages/<?php echo $row['Image']?>" width="100"
                                                    height="80" alt="<?php echo $row['ItemName']?>"></a>
                                        </div>
                                        <!-- end:Logo -->
                                        <div class="rest-descr">
                                            <h6><a
                                                    href="food-detail.php?fid=<?php echo $_SESSION['fid']=$row['FoodId'];?>"><?php echo $row['ItemName']?>
                                                    (<?php echo $row['ItemQty']?>) </a></h6>
                                            <p> <?php echo $row['ItemDes']?></p>
                                        </div>
                                        <!-- end:Description -->
                                    </div>
                                    <!-- end:col -->
                                    <div class="item-cart-info"> <span class="order-price">Rs.
                                            <?php echo $total=$row['ItemPrice']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="cart.php?delid=<?php echo $row['frid'];?>"
                                                onclick="return confirm('Do you really want to delete?');" ;><i
                                                    class="fa fa-trash" aria-hidden="true"
                                                    title=""></i></a></span>
                                    </div>
                                </div>
                                <!-- end:row -->

                                <?php 
$grandtotal+=$total;
                            } 

} else {

    echo "You cart is empty.";
}
                            ?>


                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->

                        <!--/row -->
                    </div>
                    <!-- end:Bar -->
                    <?php if($num>0){?>
                    <div class="menu order-sidebar">
                        <form method="post">
                            <div>
                                <div class="sidebar-wrap">
                                    <div class="widget widget-cart">
                                        <div class="widget-heading">
                                            <h3 class="widget-title text-dark">
                                                Your Shopping Cart
                                            </h3>

                                        </div>
                                        <div class="">
                                            <div class="widget-body">

                                                <div class="form-group row no-gutter">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="flatbldgnumber"
                                                            placeholder="Flat or Building Number" class="form-control"
                                                            required="true">
                                                        <input type="text" name="streename" placeholder="Street Name"
                                                            class="form-control" required="true">
                                                        <input type="text" name="area" placeholder="Area"
                                                            class="form-control" required="true">
                                                        <input type="text" name="landmark" placeholder="Landmark if any"
                                                            class="form-control">
                                                        <input type="text" name="city" placeholder="City"
                                                            class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                            <hr />


                                            <div class="widget-body">
                                                <div class="price-wrap">
                                                    <p>TOTAL</p>
                                                    <h3 class="value"><strong><?php echo $grandtotal;?></strong></h3>
                                                    <p>Free Shipping</p>
                                                    <button type="submit" name="placeorder"
                                                        class="btn theme-btn btn-lg">Place order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end:Right Sidebar -->
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <!-- end:row -->
                </div>
                <!-- end:Container -->


            </div>
            <!-- start: FOOTER -->
            <?php include('includes/footer.php');?>
            <!-- end:Footer -->
            <!-- end:page wrapper -->
        </div>
        <!--/end:Site wrapper -->

        <!-- Bootstrap core JavaScript
    ================================================== -->
 <script src="https://kit.fontawesome.com/bdb42816d8.js" crossorigin="anonymous"></script>
        <script src="js/jquery.min.js"></script>
        <!-- font Awesome Icon Script -->
       
        <script src="js/tether.min.js"></script>

        <script src="js/animsition.min.js"></script>

        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
</body>

</html>
<?php } ?>