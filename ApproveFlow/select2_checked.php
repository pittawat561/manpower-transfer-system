<?php

include "../service/DB-Config.php";


  if(!isset($_POST['APS'])){ 
    $fetch = $connDB_MTS->query("SELECT * FROM mts_user ORDER BY Emp_ID ");
  }else{ 
    $id = $_POST['APS'];   
    $fetch = $connDB_MTS->query("SELECT * FROM mts_user WHERE Emp_ID LIKE '%".$id."%' ");
  } 
  
  $data = array();
  while ($row = mysqli_fetch_array($fetch)) {    
    $data[] = array("id"=>$row['Emp_ID'], "text"=>$row['Emp_ID']);
  }
  echo json_encode($data);


  

?>