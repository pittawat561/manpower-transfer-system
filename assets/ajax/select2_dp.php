<?php




include "../../service/DB-Config.php";

  if(!isset($_POST['dep_name'])){ 
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT Department_id,Department FROM master_mapping ORDER BY Department_id ");
  }else{ 
    $SCT2 = $_POST['dep_name'];   
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT Department_id,Department FROM master_mapping WHERE Department LIKE '%".$SCT2."%' ");
  } 
  $data = array();
  while ($row = mysqli_fetch_array($fetch)) {    
    $data[] = array( "id"=>$row['Department'], "text"=>$row['Department']);
  }
  echo json_encode($data);





   
      
?>