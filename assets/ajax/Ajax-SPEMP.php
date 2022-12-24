<?php

include "../../service/DB-Config.php";

$SPEMP = $_POST['show_supemp'];   

  if(!isset($_POST['show_supemp'])){ 
    $fetchSPEMP = $connDB_DBMC->query("SELECT DISTINCT * FROM employee ORDER BY Emp_ID LIMIT 20");
  }else{ 
    $fetchSPEMP = $connDB_DBMC->query("SELECT DISTINCT * FROM employee WHERE ( Emp_ID LIKE '%".$SPEMP."%' ) OR ( Empname_eng LIKE '%".$SPEMP."%' ) ");
  } 
  
  $dataSPEMP = array();
  while ($row = mysqli_fetch_array($fetchSPEMP)) {    
    $dataSPEMP[] = array("id"=>$row['Emp_ID'], "text"=>$row['Emp_ID'].' '.$row['Empname_engTitle'].' '.$row['Empname_eng'].' '.$row['Empsurname_eng']);
  }
  echo json_encode($dataSPEMP);


  

?>