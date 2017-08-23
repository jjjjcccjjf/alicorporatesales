<?php

function check_login($session_var)
{
	if(isset($session_var->userdata['alicorporate_logged_in'])
	&& $session_var->userdata['alicorporate_logged_in'] == ALI_SESSION_KEY)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function concat_existing_get()
{
	$pagination_a_href = "";
	$string_get = "";
	if(isset($_GET))
	{
		$existing_get = array();
		foreach ($_GET as $get_key => $get_value) {
			$existing_get[] = $get_key."=".$get_value;
			$string_get = implode("&", $existing_get);
		}
	}
	if($string_get != "")
	{
		$pagination_a_href = "?".$string_get;
	}

	return $pagination_a_href;
}

function require_tcpdf()
{
	require_once(APPPATH.'helpers/tcpdf/tcpdf.php');
}

?>
