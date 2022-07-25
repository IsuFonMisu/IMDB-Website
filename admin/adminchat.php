<?php

    $URL = "https://film-database-aeee6-default-rtdb.firebaseio.com/Chats.json";


    function get_messages() {
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE,
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch); curl_close($ch);
        return json_decode($response, true);
    }
    
    function send_msg($msg, $name, $type, $to) { 
        global $URL;
        $ch = curl_init();
        $msg_json = new stdClass();
        $msg_json->msg = $msg;
        $msg_json->type = $type;
        $msg_json->name = $name;
        $msg_json->to = $to;
        $msg_json->time = date('H:i');
        $encoded_json_obj = json_encode($msg_json); 
        curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                    CURLOPT_POST => TRUE,
                                    CURLOPT_RETURNTRANSFER => TRUE,
                                    CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                    CURLOPT_POSTFIELDS => $encoded_json_obj ));
        $response = curl_exec($ch); 
        return $response;
    }

    $msg_res_json = get_messages();

    if (isset($_POST['usermsg'])) {
        $user_msg = $_POST['usermsg'];
        $user_name = $_POST['username'];
        $type = $_POST['type'];
        $to = $_POST['to'];
        send_msg($user_msg, $user_name, $type, $to);
        echo $user_msg;
    }

?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <title>Admin Chat</title>
</head>

<div class="menu">
<div class="back"><i class="fa fa-chevron-left"></i> <img src="https://media-exp1.licdn.com/dms/image/D4D35AQGoknZVn70kyA/profile-framedphoto-shrink_800_800/0/1647008013784?e=1656255600&v=beta&t=HrCWpk2YPkU-mzXwXM5NfaYFuVK9jsAcAS0RnZNjbSU" draggable="false"/></div>
<div class="name">Support</div>
<div class="last">18:09</div>
</div>
<ol class="chat">
<?php
    $keys = array_keys($msg_res_json);
    for ($i = 0; $i < count($keys); $i++){
        $chat_msg = $msg_res_json[$keys[$i]];
        $name = $chat_msg['name'];
        $type = $chat_msg['type'];
        $msg = $chat_msg['msg'];
        $time = $chat_msg['time'];
        if($name == 'admin'){
            $to = $chat_msg['to'];
        }
        if ($name == 'admin') {
            $from = 'other';
        } else {
            $from = 'self';
        }
       if($name == 'admin'){
            echo  '
        <li class="'.$from.'">
        <div class="avatar">
                    <img src="https://media-exp1.licdn.com/dms/image/D4D35AQGoknZVn70kyA/profile-framedphoto-shrink_800_800/0/1647008013784?e=1656255600&v=beta&t=HrCWpk2YPkU-mzXwXM5NfaYFuVK9jsAcAS0RnZNjbSU" draggable="false"/>
                </div>
                    <div class="msg">
                        <p><b>'.$name.'</b></p>
                        <p><i><b>TO:&nbsp</b></i>'.$to.'<p>
                        <p><i><b>TYPE:&nbsp</b>'.$type.'</i></p>
                        <p>'.$msg.'</p>                        
                        <time>'.$time.'</time>
                    </div>
                </li>';
       }
       else{
        echo  '
        <li class="'.$from.'">
        <div class="avatar">
                    <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/>
                </div>
                    <div class="msg">
                        <p><b>'.$name.'</b></p>
                        <p><b>TYPE:&nbsp</b>'.$type.'</p>
                        <p>'.$msg.'</p>
                        <time>'.$time.'</time>
                    </div>
                </li>';
       }
    }
?>
</ol>
<form name="form" action = "adminchat.php" method="POST">   
    <strong>NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
    <input name="username" class="namearea" type="text" placeholder="Enter your name!"/><br><br>
    <strong>TO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
    <input name="to" class="namearea" type="text" placeholder="User"/><br><br>
    <strong>SUBJECT OF ISSUE:<FONT COLOR="#FF0000">*</FONT></strong>
    <select name="type" class="dropdown">
        <option value="Database Problems">Database Problems</option>
        <option value="Website Problems">Website Problems</option>
    </select><br><br>
    <strong>MESSAGE:</strong>
    <input name="usermsg" class="textarea" type="text" placeholder="Type here!"/>
    <button type="submit" class="btn btn-4 btn-sep icon-send" value="Submit">Send</button>   
</form>