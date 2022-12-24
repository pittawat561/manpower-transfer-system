<?php 
include '../service/DB-Config.php';
//: Convert ID > Name [ Shift ] 
$Sh_A = $_POST['hidden_mts_sf_name'][$count];
$resultSh_A = $connDB_DBMC->query("SELECT DISTINCT * FROM shift WHERE Shift_name = '".$Sh_A."'");
$rowSh_A    = mysqli_fetch_array($resultSh_A);
$SFT1       = $rowSh_A['Shift_ID'];
//: Convert ID > Name [ Shift ]
$SFT2 = $_POST['hidden_shift'][$count];
$resultSFT2 = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM shift WHERE Shift_name = '".$SFT2."'");
$rowSFT2    = mysqli_fetch_array($resultSFT2);
$SFT2       = $rowSFT2['Shift_ID'];

?>