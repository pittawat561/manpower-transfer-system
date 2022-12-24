<?php

session_start();

include 'DB-Config.php';




$errors = array();

$Username = $connDB_MTS->real_escape_string($_POST['Username']);
$query = $connDB_MTS->query("SELECT * FROM mts_user WHERE Emp_ID = '" . $Username . "'");
$result = $query->fetch_array();



if (!$result) {
	array_push($errors, "Error");
	$_SESSION["error"] = "รหัสพนักงานไม่ถูกต้อง";
	header("location: ../login.php");
} else {

	function getClientIp_Show()
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if (getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if (getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if (getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if (getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if (getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	$ip = getClientIp_Show();

	$connDB_MTS->query("UPDATE mts_user SET IP_address = '".$ip."', Time = NOW() WHERE Emp_ID = '".$result["Emp_ID"]."'");
	header("location: ../view/home.php");
	$_SESSION["Emp_ID"] = $result["Emp_ID"];

	SETCOOKIE("loggedIn", TRUE, TIME() + (10 * 365 * 24 * 60 * 60), '/');
	SETCOOKIE("UserID_MTS", $result['Emp_ID'], TIME() + (10 * 365 * 24 * 60 * 60), '/');

}
$connDB_MTS->close();
