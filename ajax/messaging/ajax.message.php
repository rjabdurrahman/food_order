<?php

session_start();
$ID = '';
require_once(dirname(dirname(__DIR__)).'/includes/dbconnection.php');


if(isset($_SESSION['fosuid'])){
    $ID = $_SESSION['fosuid'];
}else{
    $ID = $_SESSION['fosaid'];
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['send'], $_GET['msg']) && $_GET['send'] == 1){
    $getAdminID = mysqli_query($con, "select * from tbladmin limit 1");
    $adminObj = mysqli_fetch_array($getAdminID);
    $admin = $adminObj['ID'];
    $date = date("Y-m-d H:i:s");
    $msg = $_GET['msg'];
    if(isset($_GET['conversation_id'])){
        $conversationID = $_GET['conversation_id'];
        $insert = mysqli_query($con, "insert into tblchats(sender_id, message, conversation_id, date) values($ID,'$msg',$conversationID, '$date')");
        if($insert){
            echo "success";
        }else{
            echo "error";
        }
    }else{
        $checkConversation = mysqli_query($con, "select * from tblconversations where sender_id = '$ID' and reciver_id = '$admin' or sender_id = '$admin' and reciver_id = '$ID'");

        if($checkConversation->num_rows > 0){
            $getConversationID = mysqli_fetch_array($checkConversation);
            $conversationID = $getConversationID['id'];
            $insert = mysqli_query($con, "insert into tblchats(sender_id, message, conversation_id, date) values($ID,'$msg',$conversationID, '$date')");
            if($insert){
                echo "success";
            }else{
                echo "error";
            }
        }else{
            $create_conversation = mysqli_query($con, "insert into tblconversations(sender_id, reciver_id) values($ID, $admin)");

            $conversationID = mysqli_insert_id($con);
            if($conversationID > 0){
                $insert = mysqli_query($con, "insert into tblchats(sender_id, message, conversation_id, date) values($ID,'$msg',$conversationID, '$date')");
                if($insert){
                    echo "success";
                }else{
                    echo "error";
                }
            }
        }
    }
}

elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['get_messages']) && $_GET['get_messages'] == 1){
    $getAdminID = mysqli_query($con, "select * from tbladmin limit 1");
    $adminObj = mysqli_fetch_array($getAdminID);
    $admin = $adminObj['ID'];
    $checkConversation = mysqli_query($con, "select * from tblconversations where sender_id = '$ID' and reciver_id = '$admin' or sender_id = '$admin' and reciver_id = '$ID'");
    
    if($checkConversation->num_rows > 0){
        $getConversationID = mysqli_fetch_array($checkConversation);
        $conversationID = '';
        $getMessages = '';
        if(isset($_GET['conversation_id'])){
            $conversationID = $_GET['conversation_id'];
            $getMessages = mysqli_query($con, "select * from tblchats where conversation_id = '$conversationID'");
        }else{
            $conversationID = $getConversationID['id'];
            $getMessages = mysqli_query($con, "select * from tblchats where sender_id = '$admin' and conversation_id = '$conversationID' or sender_id = '$ID' and conversation_id = '$conversationID'");
        }
        

        if($getMessages->num_rows > 0){
            $data = array();
            while($messages = mysqli_fetch_assoc($getMessages)){
                $data[] = [
                    "conversation_id" => $messages['conversation_id'],
                    "message" => $messages['message'],
                    "sender" => $messages['sender_id'],
                    "date" => date("M d, Y H:i a",strtotime($messages['date']))
                ];
            }

            echo json_encode($data);
        }
    }
    
}