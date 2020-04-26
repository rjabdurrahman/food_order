<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } 
  else {

    if(isset($_POST['bsubmit'])) {
        $sql = "UPDATE tblorderaddresses SET Payment='{$_POST['mobile']}/{$_POST['trxid']}' WHERE OrderNumber = {$_POST['orderid']}";
        mysqli_query($con, $sql);
        header("Location: my-order.php");
    }
    if(isset($_POST['codsubmit'])) {
        $sql = "UPDATE tblorderaddresses SET Payment='COD' WHERE OrderNumber = {$_POST['orderid']}";
        mysqli_query($con, $sql);
        header("Location: my-order.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
    </style>
    <script src="js/jquery.min.js"></script>
</head>

<body style="width: 500px; margin: auto;">

    <h2>Select Method</h2>
    <input type="radio" onchange="if(this.checked) {$('#bkash').hide();$('#cod').show();}" name="pmathod" value="cod">
    Cash On Delivery
    <br>
    <input type="radio" onchange="if(this.checked) {$('#bkash').show();$('#cod').hide();}" checked="checked"
        name="pmathod" value="bkash">
    bKash
    <div id="cod" style="display: none">
        <form style="display: block; width: 100%" method="post">
            <input type="hidden" name="orderid" value="<?php echo $_GET['orderid']; ?>">
            <input style="width: 100%" type="submit" name="codsubmit" value="Continue to checkout" class="btn">
        </form>
    </div>
    <div id="bkash" class="row" style="margin-top: 20px;">
        <div class="col-75">
            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col-50">
                            <ol style="border-bottom: 1px solid black; padding-bottom: 8px;">
                                <li>Dial <b>*247#</b></li>
                                <li>Select <b>Send Money</b></li>
                                <li>Input Mobile No: <b>01757110296</b></li>
                                <li>Input Counter No: <b>1</b></li>
                                <li>Input <b>PIN</b></li>
                                <li><b>Confirm</b></li>
                            </ol>
                            <label for="number"><i class="fa fa-envelope"></i> Mobile No (Your bKash Mobile No)</label>
                            <input type="text" name="mobile" placeholder="Mobile No" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Trx ID (From SMS received)</label>
                            <input type="text" name="trxid" placeholder="Trx ID" required>
                            <input type="hidden" name="orderid" value="<?php echo $_GET['orderid']; ?>">
                        </div>
                        <input type="submit" name="bsubmit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>