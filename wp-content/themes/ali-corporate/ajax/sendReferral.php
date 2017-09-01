<?php
include("jp_lib/jp_lib.php");
if(isset($_POST['email']))
{
  # Set expected post variables to be looped
  // $referal_post_data = array("referral_name", "referral_brand", "referral_project", "referral_budget", "referral_contact", "referral_email");
  $referee_post_data = array("employer","name","contact","email");

  # add referee
  $referee_data = array();
  foreach ($referee_post_data as $arr_key) {
    $referee_data[$arr_key] = $_POST[$arr_key];
  }
  $referee_data["date_sent"] = date("Y-m-d H:i:s");

  $add_referee['table'] = "emails_referees";
  $add_referee['data'] = $referee_data;
  if(jp_add($add_referee))
  {
    $referee_id = jp_last_added();
    for ($i=1; $i <= $_POST["refer_count"]; $i++) {
      $referral_data = array();
      $referral_data["name"] = $_POST["referral_name_".$i];
      $referral_data["brand"] = $_POST["referral_brand_".$i];
      $referral_data["project"] = $_POST["referral_project_".$i];
      $referral_data["budget"] = $_POST["referral_budget_".$i];
      $referral_data["contact"] = $_POST["referral_contact_".$i];
      $referral_data["email"] = $_POST["referral_email_".$i];
      $referral_data["referred_by"] = $referee_id;
      $referral_data["date_sent"] = date("Y-m-d H:i:s");

      $add_referral['table'] = "emails_referrals";
      $add_referral['data'] = $referral_data;
      if(jp_add($add_referral))
      {
        $subject = "ALI CORPORATE SALES [NEW REFERRAL]";
        $message = "REFERRAL DETAILS \n
        Name: ".$_POST['referral_name_'.$i]." \n
        Brand: ".$_POST['referral_brand_'.$i]." \n
        Project: ".$_POST['referral_project_'.$i]." \n
        Budget: ".$_POST['referral_budget_'.$i]." \n
        Contact: ".$_POST['referral_contact_'.$i]." \n
        Email: ".$_POST['referral_email_'.$i]." \n
        \n REFERRED BY \n
        Name: ".$_POST['name']." \n
        Employer: ".$_POST['employer']." \n
        Contact: ".$_POST['contact']." \n
        Email: ".$_POST['email']." \n
        ";
        $headers = "From: noreply@betaprojex.com \r\n";
        $to = "svboquiren@myoptimind.com";
        mail("cvalerio@myoptimind.com",$subject,$message,$headers);
        if(!mail($to,$subject,$message,$headers))
        {
          $failed = 1;
        }
      }
    }
  }
  else
  {
    $failed = 2;
  }

  if($failed < 1)
  {
    echo "true";
  }
  else
  {
    echo $failed;
  }
}
else
{
  echo false;
}

?>
