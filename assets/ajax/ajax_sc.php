<?php




include "../../service/DB-Config.php";
    // $sc_code = 'SDM-SC0010';
    
    $sc_code = $_POST['SC_ID'];
    // $cut = substr("$sc_code", 4, -4);
    // if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department = '$sc_code'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department_id'];
    // }else if($cut == 'SC'){
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept);
    //     $dept = $rowdept['Department_id'];
    // }else if($cut == 'SB'){
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept);
    //     $dept = $rowdept['Department_id'];
    // }else if($cut == 'LN'){
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Line_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept); 
    //     $dept = $rowdept['Department_id'];
    // }else if($cut == 'GR'){
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Group_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept); 
    //     $dept = $rowdept['Department_id'];
    // }else if($cut == 'DV'){
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept);
    //     $dept = $rowdept['Department_id'];
    // }else{
    //     $resultdept = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Company_id = '$sc_code'");
    //     $rowdept=mysqli_fetch_array($resultdept);
    //     $dept = "-";
    // };

    // echo $dept;
    
        // $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  "); 
        $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT Section_id FROM master_mapping  WHERE  Department_id = '".$dept."'");
        $fetch_sub = mysqli_query($connDB_DBMC,"SELECT DISTINCT SubSection_id FROM master_mapping  WHERE  Department_id = '".$dept."'");
        $fetch_gr = mysqli_query($connDB_DBMC,"SELECT DISTINCT Group_id FROM master_mapping  WHERE  Department_id = '".$dept."'");  
        $fetch_line = mysqli_query($connDB_DBMC,"SELECT DISTINCT Line_id FROM master_mapping  WHERE  Department_id = '".$dept."'");    
        $fetch_dep = mysqli_query($connDB_DBMC,"SELECT DISTINCT Department_id FROM master_mapping  WHERE  Department_id = '".$dept."'");

    
    $DVID = array();
      while ($row = mysqli_fetch_array($fetch)) {    
            $DVID[] = array("id"=>$row['Section_id'], "text"=>$row['Section_id']);
        }
      
      while ($row_SUP = mysqli_fetch_array($fetch_sub)) {    
        if($row_SUP["SubSection_id"] != ""){
            $DVID[] = array("id"=>$row_SUP['SubSection_id'], "text"=>$row_SUP['SubSection_id']);
        }
      }
      while ($row_GR = mysqli_fetch_array($fetch_gr)) {    
        if($row_GR["Group_id"] != ""){
            $DVID[] = array("id"=>$row_GR['Group_id'], "text"=>$row_GR['Group_id']);
        }
      }
      while ($row_LN = mysqli_fetch_array($fetch_line)) {    
        if($row_LN["Line_id"] != ""){
            $DVID[] = array("id"=>$row_LN['Line_id'], "text"=>$row_LN['Line_id']);
        }
      }
      while ($row_dep = mysqli_fetch_array($fetch_dep)) {    
        if($row_dep["Department_id"] != ""){
            $DVID[] = array("id"=>'-', "text"=>'-');
        }
      }
    
    echo json_encode($DVID);

    




   
      
?>