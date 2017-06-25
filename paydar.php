<?php

header('Content-Type: text/html; charset=utf-8');
$token= "345190044:AAErb_ZgfoMCXuIncPwv5xTIXxmre662FnE";
$data = file_get_contents("php://input");
$json = json_decode($data, JSON_BIGINT_AS_STRING);
$group_id = $json["message"]["chat"]["id"];
$message_in_group = $json["message"]["text"];
$user_id = $json["message"]["from"]["id"];
$text = "ارسال هرگونه لینک در گروه ممنوع می باشد. کاربر خاطی از گروه دیلیت می شود";
$preg1 = "/^(http|https|ftp|ftps)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)?((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.[a-zA-Z]{2,4})(\:[0-9]+)?(/[^/][a-zA-Z0-9\.\,\?\'\\/\+&amp;%\$#\=~_\-@]*)*$/";
$preg2 = "/^(?!.*\n.*)(?:([^:]*)(?::(.*?))?@)?([^:]*)(?::([^:]*?))?$/";
if($group_id == "-1001147609116"){
    if(preg_match($preg1, $message_in_group) || preg_match($preg2, $message_in_group)){
$url1 = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=-" .$group_id."&text=".$text;
     file_get_contents($url1);
     
     $url2 = "https://api.telegram.org/bot".$token."/kickChatMember?chat_id=-" .$group_id."&user_id=".$user_id;
        file_get_contents($url2);
    }
    
}