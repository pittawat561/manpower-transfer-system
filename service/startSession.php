<?php
session_start();
error_reporting(~0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('asia/bangkok');

if (!isset($_SESSION['Emp_ID'])) {
	header("location: ../login.php");
	exit();
}
//*** Get User Login
$SQL = $connDB_MTS->query("SELECT * FROM mts_user WHERE Emp_ID = '" . $_SESSION['Emp_ID'] . "' ");
$objResult = $SQL->fetch_array(MYSQLI_ASSOC);
