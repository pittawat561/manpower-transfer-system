<?php 
include '../service/DB-Config.php';

//! Convert ID > Name [ Department ]
$DP = $_POST['hidden_dp_name'][$count];
$fetch_DP  = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Department` = '$DP'");
$rowdp     = mysqli_fetch_assoc($fetch_DP);
$dep       = $rowdp['Department_id'];
// //! Convert ID > Name [ Department ] NEW
$DP1 = $_POST['hidden_mts_dp_name'][$count];
$fetch_DP  = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Department` = '$DP1'");
$rowdp     = mysqli_fetch_assoc($fetch_DP);
$dep_new   = $rowdp['Department_id'];





?>