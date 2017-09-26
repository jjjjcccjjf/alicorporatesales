<?php

include("jp_lib/jp_lib.php");

$item['table'] = "emails_bank_inquiry_new_seller";

$_POST["date_sent"] = date("Y-m-d H:i:s");

$item['data'] = $_POST;

if(jp_add($item)){

  $subject = "ALI CORPORATE SALES [BANK INQUIRY - ASSIGN ME A SELLER]";

  $message = "

  Name: ".$_POST['name']." \n

  Email: ".$_POST['email']." \n

  Contact Number: ".$_POST['contact_num']."\n

  Message: ".$_POST['message']." \n

  Referral From: ".$_POST['referral_from']." \n";

  if(isset($_POST['other_referral']) && $_POST['other_referral'] != "")
  {
    $message .= "

    Other Referral: ".$_POST['other_referral']." \n";
  }

  $message .= "

  Name of Bank Officer: ".$_POST['bank_officer']." \n ";

  $headers = array();

  $headers[] = "From: noreply@betaprojex.com";

  // $headers[] = "Cc: alicorporatesalesgroup@gmail.com";

  // $to = "corporatesales@ayalaland.com.ph";
  $to = "svboquiren@myoptimind.com";

  mail("cvalerio@myoptimind.com",$subject,$message,"From: noreply@betaprojex.com \r\n");

  echo (mail($to,$subject,$message,implode("\r\n", $headers))) ? 1 : 0 ;

}
