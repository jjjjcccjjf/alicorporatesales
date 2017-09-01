<?php

include("jp_lib/jp_lib.php");

$item['table'] = "emails_arc";

$_POST["date_sent"] = date("Y-m-d H:i:s");

$item['data'] = $_POST;
if(jp_add($item)){
  $subject = "AYALA REWARDS CIRCLE [INQUIRY]";
  $message = "INQUIRY BODY: \n
  Name: ".$_POST['name']." \n
  Email: ".$_POST['email']." \n
  Brand: ".$_POST['brand']." \n
  Project Name: ".$_POST['project_name']." \n
  Price: ".$_POST['price']." \n
  ";
  $headers = "From: noreply@betaprojex.com \r\n";
  $to = "lsalamante@myoptimind.com";
  mail("cvalerio@myoptimind.com",$subject,$message,$headers);
  echo (mail($to,$subject,$message,$headers)) ? 1 : 0 ;
}
