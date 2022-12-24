<?php

include '../service/DB-Config.php';
$id = $_POST['val'];



if(isset($id)){
    $connDB_MTS->query("DELETE FROM mts_document WHERE Document_num ='".$id."' ");
    $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_doc ='".$id."' ");
    $connDB_MTS->query("DELETE FROM mts_employee WHERE Document_num ='".$id."' ");
    $connDB_MTS->query("DELETE FROM mts_previousinfo WHERE Document_num ='".$id."' ");
};


?>