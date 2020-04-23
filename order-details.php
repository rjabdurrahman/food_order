<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{ 
 

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
</head>
<script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
</script>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <?php include_once('includes/header.php');?>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">

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
                                    Your ORDERS Delicious hot food! <a class="btn btn-link pull-right"
                                        href="#popular">
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>
                                </h3>

                            </div>
                            <div class="order-collapse" id="1">
                               

                                    <?php 
$userid= $_SESSION['fosuid'];
$oid=$_GET['orderid'];
$query=mysqli_query($con,"select tblfood.Image,tblfood.ItemName,tblfood.ItemDes,tblfood.ItemPrice,tblfood.ItemQty,tblorders.FoodId from tblorders join tblfood on tblfood.ID=tblorders.FoodId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced=1 and tblorders.OrderNumber='$oid'");
$num=mysqli_num_rows($query);
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
                                                <?php echo $total=$row['ItemPrice']?></span></div>
                                    </div>
                                    <!-- end:row -->

                                    <?php 
$grandtotal+=$total;
                    }        
 ?>
                                

                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->

                        <!--/row -->
                    </div>
                    <!-- end:Bar -->

                    <?php
$query=mysqli_query($con,"select * from  tblorderaddresses  where Ordernumber='$oid'");
while($row=mysqli_fetch_array($query))
              { ?>
                    <div class="menu order-sidebar">
                        <div class="sidebar-wrap">
                            <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                        Order # <?php echo $oid;?> Details
                                    </h3>

                                </div>
                                <div class="">
                                    <div class="widget-body">

                                        <div class="form-group row no-gutter">
                                            <div class="order-detail-bar">
                                                <p><b>Order Date :</b> <?php echo $row['OrderTime']?></p>
                                                <hr />
                                                <p><b>Flat No / Building No.:</b> <?php echo $row['Flatnobuldngno']?>
                                                </p>
                                                <p><b>Street Name: </b> <?php echo $row['StreetName']?></p>
                                                <p><b>Area :</b> <?php echo $row['Area']?></p>
                                                <p><b>Landmark :</b> <?php echo $row['Landmark']?></p>
                                                <p><b>City :</b> <?php echo $row['City']?></p>


                                            </div>
                                        </div>
                                    </div>
                                    <hr />


                                    <div class="widget-body">
                                        <div class="price-wrap text-xs-center">
                                            <p class="btn theme-btn btn-lg"><?php    

$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
?>


                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('invoice.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');"
                                                    title="Order Invoice" style="color:#fff">Invoice</a></p>

                                            <p style="color:red">
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('cancelorder.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');"
                                                    title="Cancel this order" style="color:red">Cancel this order </a>
                                            </p>

                                            <p>TOTAL</p>
                                            <h3 class="value"><strong><?php echo $grandtotal;?></strong></h3>

                                            <?php $status=$row['OrderFinalStatus'];
if($status==''){
 echo "Waiting for Restaurant confirmation";   
} else{
 ?>

                                            <p name="status" class="btn theme-btn btn-lg">
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('trackorder.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');"
                                                    title="Track order" style="color:#fff">

                                                    <?php echo $status;?></a></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:Right Sidebar -->
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
<?php } ?>