<?php


include "../../service/DB-Config.php";

  if(!isset($_POST['company'])){ 
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT Company_id FROM master_mapping ORDER BY Company_id ");
  }else{ 
    $SCT2 = $_POST['company'];   
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT Company_id FROM master_mapping WHERE Company_id LIKE '%".$SCT2."%' ");
  } 
  
  $data = array();
  while ($row = mysqli_fetch_array($fetch)) {    
    $data[] = array( "id"=>$row['Company_id'], "text"=>$row['Company_id']);
  }
  echo json_encode($data);





   
      
?>