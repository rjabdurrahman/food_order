 <div class="row border-bottom">
     <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
         <div class="navbar-header">
             <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

         </div>
         <p style="font-size: 20px;padding-top:1%"><strong>Food Ordering System!!</strong></p>

         <ul class="nav navbar-top-links navbar-right">
             <?php
$ret1=mysqli_query($con,"select tbluser.FirstName,tblorderaddresses.ID,tblorderaddresses.Ordernumber from tblorderaddresses join tbluser on tbluser.ID=tblorderaddresses.UserId where tblorderaddresses.OrderFinalStatus is null");
$num=mysqli_num_rows($ret1);

$msgs=mysqli_query($con,"select tbluser.FirstName,tblchats.message,tblchats.date from tblchats join tbluser on tbluser.ID=tblchats.sender_id where tblchats.status = 'unseen'");
            $msgcount=mysqli_num_rows($msgs);
            $adminID = $_SESSION['fosaid'];

            $conversations = mysqli_query($con, "select * from tblconversations where reciver_id = '$adminID'");

?>

             <li class="dropdown">
                 <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                     <i class="fa fa-bell"></i> <span class="label label-primary"><?php echo $num;?></span>
                 </a>

                 <ul class="dropdown-menu dropdown-alerts">
                     <li>
                         <a href="mailbox.html" class="dropdown-item">
                             <div>

                                 <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                                 <a class="dropdown-item"
                                     href="viewfoodorder.php?orderid=<?php echo $result['Ordernumber'];?>"> <i
                                         class="fa fa-envelope fa-fw"></i> #<?php echo $result['Ordernumber'];?> Order
                                     Received from <?php echo $result['FirstName'];?></a>
                                 <?php }} else {?>
                                 <a class="dropdown-item" href="view-allorderfood.php">No New Order Received</a>
                                 <?php } ?>
                             </div>
                         </a>
                     </li>

                 </ul>
             </li>

             <li class="dropdown">
                 <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                 <i class="fa fa-comments"></i>  <span class="label label-primary"><?php echo $msgcount;?></span>
                 </a>

                 <ul class="dropdown-menu dropdown-alerts">
                    <?php if($msgcount > 0):?>
                    
                     <li>
                         <a href="mailbox.html" class="dropdown-item">
                             <div>

                             <?php while($c = mysqli_fetch_array($conversations)): ?>
                                <?php
                                    $c_id = $c['id'];
                                    $msgdata = array();
                                    $getMessage = mysqli_query($con, "select * from tblchats where conversation_id = '$c_id' limit 1");
                                    
                                    $messagedata = mysqli_fetch_array($getMessage);
                                    $userid = $messagedata['sender_id'];
                                    $getUserName = mysqli_query($con, "select FirstName from tbluser where ID = '$userid'");
                                    $getUserArr = mysqli_fetch_array($getUserName);

                                    $userName = $getUserArr['FirstName'];
                                ?>
                                 <a class="dropdown-item"
                                     href="chat.php?cid=<?php echo $c_id; ?>&user=<?php echo $userName;?>"><?php echo $result['Ordernumber'];?> Message
                                     Received from <?php echo $userName;?></a>
                              <?php endwhile ?>
                             </div>
                         </a>
                     </li>
                     <?php endif ?>
                 </ul>
             </li>


             <li>
                 <a href="logout.php">
                     <i class="fa fa-sign-out"></i> Log out
                 </a>
             </li>

         </ul>

     </nav>
 </div>