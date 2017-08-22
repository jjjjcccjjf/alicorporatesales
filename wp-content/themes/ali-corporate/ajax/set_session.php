<?php
/**
 * accepts   `outside_partner`, `ayala_group`, or `bank`
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
		$_SESSION['employer_type'] = 'Bank Partners';
		break;

		default:
		# code...
		break;
	}
}

setSession($_POST['employer_type']);
echo 1;
