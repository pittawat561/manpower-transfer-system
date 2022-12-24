<?php

include "../../service/DB-Config.php";


  if(!isset($_POST['show_supemp'])){ 
    $fetchSPEMP = $connDB_MTS->query("SELECT DISTINCT * FROM mts_user ORDER BY Emp_ID ");
  }else{ 
    $SPEMP = $_POST['show_supemp'];   
    $fetchSPEMP = $connDB_MTS->query("SELECT DISTINCT * FROM mts_user WHERE Emp_ID LIKE '%".$SPEMP."%' ");
  } 
  
  $dataSPEMP = array();
  while ($row = $fetchSPEMP->fetch_array()) { 
    $dataSPEMP[] = array("id"=>$row['Emp_ID'], "text"=>$row['Emp_ID']);
  };
  echo json_encode($dataSPEMP);


  

?>