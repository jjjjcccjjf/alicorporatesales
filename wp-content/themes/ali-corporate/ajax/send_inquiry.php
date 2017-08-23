<?php

include("jp_lib/jp_lib.php");

$item['table'] = "emails_inquiry";

$_POST["date_sent"] = date("Y-m-d H:i:s");

$item['data'] = $_POST;
if(jp_add($item)){
  $subject = "ALI CORPORATE SALES [INQUIRY]";
  $message = "INQUIRY BODY: \n
  Employer Name: ".$_POST['employer']." \n
  Name: ".$_POST['name']." \n
  Email: ".$_POST['email']." \n
  Work Phone: ".$_POST['phone']." \n
  Mobile: ".$_POST['mobile']." \n
  Message: ".$_POST['message']." \n
  Send me more information about the Employee Discount: ". (($_POST['send_me_more']) ? 'Yes': 'No') ." \n
  ";
  $headers = "From: noreply@betaprojex.com \r\n";
  $to = "lsalamante@myoptimind.com";

  echo (mail($to,$subject,$message,$headers)) ? 1 : 0 ;
}
