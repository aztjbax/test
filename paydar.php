<?php

header('Content-Type: text/html; charset=utf-8');
$token= "345190044:AAErb_ZgfoMCXuIncPwv5xTIXxmre662FnE";
$data = file_get_contents("php://input");
$json = json_decode($data, JSON_BIGINT_AS_STRING);
$group_id = $json["message"]["chat"]["id"];
$message_in_group = $json["message"]["text"];
$user_id = $json["message"]["from"]["id"];
$text = "ارسال هرگونه لینک در گروه ممنوع می باشد. کاربر خاطی از گروه دیلیت می شود";

if($group_id == "-1001147609116"){

//$url1 = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=-" .$group_id."&text=".$text;
//     file_get_contents($url1);
//     
    if(filter_var($message_in_group, FILTER_SANITIZE_URL)){
        
    
    $url2 = "https://api.telegram.org/bot".$token."/kickChatMember?chat_id=-" .$group_id."&user_id=".$user_id;
        file_get_contents($url2);
    }
}
    