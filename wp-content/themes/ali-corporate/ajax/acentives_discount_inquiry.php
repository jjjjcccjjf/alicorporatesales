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

  Contact Number: ".$_POST['contact_num']."\n 

  Years of service: ".$_POST['service_years']." \n

  Brand: ".$_POST['brand']." \n

  Project Name: ".$_POST['project_name']." \n

  Message: ".$_POST['message']." \n

  ";

  $headers = array();

  $headers[] = "From: noreply@betaprojex.com";

  $headers[] = "Cc: alicorporatesalesgroup@gmail.com";



  $to = "corporatesales@ayalaland.com.ph";
  // $to = "svboquiren@myoptimind.com";

  mail("cvalerio@myoptimind.com",$subject,$message,"From: noreply@betaprojex.com \r\n");



  echo (mail($to,$subject,$message,implode("\r\n", $headers))) ? 1 : 0 ;

}

