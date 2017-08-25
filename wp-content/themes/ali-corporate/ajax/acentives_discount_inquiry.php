<?php

include("jp_lib/jp_lib.php");

$item['table'] = "emails_acentives_discount";

$_POST["date_sent"] = date("Y-m-d H:i:s");

$item['data'] = $_POST;
if(jp_add($item)){
  $subject = "ALI CORPORATE SALES [ACENTIVES DISCOUNT INQUIRY]";
  $message = "Am I qualified for Acentives Discount? \n
  Employer Name: ".$_POST['employer']." \n
  Name: ".$_POST['name']." \n
  Email: ".$_POST['email']." \n
  Years of service: ".$_POST['service_years']." \n
  Name of Project/Unit: ".$_POST['project']." \n
  Employee Type: ".$_POST['employee_type']." \n
  ";
  $headers = "From: noreply@betaprojex.com \r\n";
  $to = "lsalamante@myoptimind.com";
  mail("cvalerio@myoptimnd.com",$subject,$message,$headers);

  echo (mail($to,$subject,$message,$headers)) ? 1 : 0 ;
}
