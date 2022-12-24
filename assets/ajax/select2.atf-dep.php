<?php
include "../../service/DB-Config.php";

    // $id = 'SDM';
    $id = $_POST['COM_ID'];
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT `Company_id`, `Department`, `Department_id` FROM `master_mapping` WHERE Company_id = '".$id."' ORDER BY Department_id");
    $DVID = array();
      while ($row = mysqli_fetch_array($fetch)) {    
            $DVID[] = array("id"=>$row['Department'], "text"=>$row['Department']);
        }

    
    echo json_encode($DVID);

    




   
      
?>