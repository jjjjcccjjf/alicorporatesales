<?php



include("jp_lib/jp_lib.php");



$item['table'] = "emails_country_club_share";

$_POST["date_sent"] = date("Y-m-d H:i:s");

$item['data'] = $_POST;

if(jp_add($item)){

  $subject = "ALI CORPORATE SALES [COUNTRY CLUB SHARE INQUIRY]";

  $message = "
  Name: ".$_POST['name']." \n
  Email: ".$_POST['email']." \n
  Contact number: ".$_POST['contact_num']." \n
  Type of share: ".$_POST['type_of_share']." \n
  Message: ".$_POST['message']." \n
  ";

  $headers = array();

  $headers[] = "From: noreply@betaprojex.com";
  $headers[] = "Cc: alicorporatesalesgroup@gmail.com";

  $to = "corporatesales@ayalaland.com.ph";
  // $to = "svboquiren@myoptimind.com";
  mail("cvalerio@myoptimind.com",$subject,$message,"From: noreply@betaprojex.com \r\n");
  mail("lsalamante@myoptimind.com",$subject,$message,"From: noreply@betaprojex.com \r\n");

  echo (mail($to,$subject,$message,implode("\r\n", $headers))) ? 1 : 0 ;

}
