<?php
include '../../service/DB-Config.php';
include '../../service/startSession.php';

$id = $_SESSION['Emp_ID'];

$sql = "SELECT * FROM mts_apf WHERE mtsAP_empid = '".$id."' AND mtsAP_status = 1 ";
$result = $connDB_MTS->query($sql);
$num = $result->num_rows;
if($num == '0'){
    
}else{
    echo json_encode($num);
}
$connDB_MTS->close();
?>