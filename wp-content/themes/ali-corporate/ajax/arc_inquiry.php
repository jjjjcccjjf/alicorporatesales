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
  Property Purchased: ".$_POST['property_purchased']." \n
  Price: ".$_POST['price']." \n
  ";
  $headers = "From: noreply@betaprojex.com \r\n";
  $to = "lsalamante@myoptimind.com";
  mail("cvalerio@myoptimnd.com",$subject,$message,$headers);
  echo (mail($to,$subject,$message,$headers)) ? 1 : 0 ;
}