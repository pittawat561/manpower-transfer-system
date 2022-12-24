<?php

include '../service/DB-Config.php';

$update = $_POST['val'];

if($update=='save'){
    $connDB_MTS->query("UPDATE mts_employee SET 
    mts_Personal_grade = '".$_POST['data']['psn']."',
    mts_Position_name = '".$_POST['data']['pon']."',
    mts_Sectioncode_ID = '".$_POST['data']['scc_id']."',
    mts_Section_type = '".$_POST['data']['sc_type']."',
    mts_CostCenter_ID = '".$_POST['data']['cc_id']."',
    mts_Shift_ID = '".$_POST['data']['sf_name']."',
    Supervisor_Code = '".$_POST['data']['scode']."',
    reason_tranfer = '".$_POST['data']['reason']."'
    WHERE Emp_ID = '".$_POST['data']['empid']."' AND Document_num = '".$_POST['data']['doc']."'");
}else{
    echo'error';
}



?>