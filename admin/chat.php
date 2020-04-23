<?php
  session_start();
  require_once('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/chat.css">
</head>
<body>
    <div class="chat-page">
        <div class="container">
            <div class="chat-feature">
                <div class="chatlist">
                    <?php
                     $adminID = $_SESSION['fosaid'];
                     $conversations = mysqli_query($con, "select * from tblconversations where reciver_id = '$adminID'");

                    ?>
                    <ul>
                        <?php if(mysqli_num_rows($conversations) > 0): ?>
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
                        <li>
                            <a href="chat.php?cid=<?php echo $c_id; ?>&user=<?php echo $userName;?>">
                                <p class="username"><span><?php echo $userName; ?>: </span><?php echo $messagedata['message']; ?></p>
                                <p class="date"><span><?php echo date("M d, Y H:i a", strtotime($messagedata['date'])); ?></span></p>
                            </a>
                        </li>
                        <?php endwhile ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>

            <div class="inbox-feature">
                <div class="inbox-head">
                    <p>Chat with <?php echo $_GET['user']; ?></p>
                </div>
                <div class="inbox">

                </div>
                <div class="inbox-footer">
                    <input type="hidden" id="c_id" value="<?php echo $_GET['cid']; ?>">
                    <div class="chat-typing">
                       <input type="text" id="msg" placeholder="Type your message...">
                       <button id="send"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var date = new Date();
            var options = {day:"numeric", month:"short", hour:"numeric", minute:"numeric"};
            $('#msg').keyup(function(e){
                e.preventDefault();
                if(e.keyCode == 13){
                    var msg = $(this).val().trim();
                    var con_id = $('#c_id').val();
                    $.ajax({
                        url:'../ajax/messaging/ajax.message.php',
                        method:'GET',
                        data:{
                            send:1,
                            msg:msg,
                            conversation_id:con_id
                        },
                        success:function(resp){
                            if(resp.indexOf('success') >= 0){
                                $('.inbox').append(`
                                <div>
                                <div class="msg-text-session">
                                <div class="msg-content">
                                <p class="text"> <span>${msg}</span> </p>
                                <p class="date"> <span>${date.toLocaleDateString("en-US", options)}</span> </p>
                                </div>
                                </div>
                                </div>
                                `);
                            }
                        }
                    });
                    $(this).val('');
                }
            });

            function get_messages(){
                var con_id = $('#c_id').val();
                $.ajax({
                    url:'../ajax/messaging/ajax.message.php',
                    method:'GET',
                    data:{
                        get_messages:1,
                        conversation_id: con_id
                    },
                    success:function(resp){
                        if(resp != ''){
                            var data = JSON.parse(resp);
                            var sessionID = <?php if(isset($_SESSION['fosaid'])){echo $_SESSION['fosaid'] ;} ?>;
                            var messages = '';
                            for(msg of data){
                                if(msg.sender == sessionID){
                                    messages += `
                                    <div>
                                    <div class="msg-text-session">
                                       <div class="msg-content">
                                        <p class="text"> <span>${msg.message}</span> </p>
                                        <p class="date"> <span>${msg.date}</span> </p>
                                       </div>
                                    </div>
                                    </div>
                                    `;
                                }else{
                                    messages += `
                                    <div>
                                    <div class="msg-text">
                                       <div class="msg-content">
                                        <p class="text"> <span>${msg.message}</span> </p>
                                        <p class="date"> <span>${msg.date}</span> </p>
                                       </div>
                                    </div>
                                    </div>
                                    `;
                                }
                            }

                            $('.inbox').html(messages);
                        }
                    }
                });
            }

            setInterval(get_messages, 5000);
        })


    </script>
    <!-- font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/bdb42816d8.js" crossorigin="anonymous"></script>
</body>

</html>