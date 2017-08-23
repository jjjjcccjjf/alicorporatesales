<?php
/**
 * accepts   `outside`, `ayala`, or `bank`
 * @param [type] $employer_type [description]
 */
session_start();
function setSession($employer_type)
{
	switch ($employer_type) {
		case 'outside':
		$_SESSION['employer_type'] = 'Outside partners';
		break;
		case 'ayala':
		$_SESSION['employer_type'] = 'Ayala Group Employee';
		break;
		case 'bank':
		$_SESSION['employer_type'] = 'BANK/INSTITUTIONAL OFFERS';
		break;

		default:
		# code...
		break;
	}
}

$_SESSION['employer_name'] = $_POST['employer_name'];

setSession($_POST['employer_type']);
echo 1;
