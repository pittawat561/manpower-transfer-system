<?php 

    $sec_id = $row['Sectioncode_ID'];
    $cut = substr("$sec_id", 4, -4);
    if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SC'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SB'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'LN'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'GR'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'DV'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    }else{
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$sec_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    }
    ////
    $fetch_DV     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Division_id` = '$sec_id'");
    while ($rowdv = mysqli_fetch_assoc($fetch_DV)) {
        if ($rowdv["Division"] != "") {
            $sc_name = $rowdv['Division'];
        }
    }
    $fetch_DP     =  mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Department_id` = '$sec_id'");
    while ($rowdp = mysqli_fetch_assoc($fetch_DP)) {
        if ($rowdp["Department"] != ""
        ) {
            $sc_name = $rowdp['Department'];
        }
    }
    $fetch_SC     =  mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Section_id` = '$sec_id'");
    while ($rowSc = mysqli_fetch_assoc($fetch_SC)) {
        if ($rowSc["Section"] != ""
        ) {
            $sc_name = $rowSc['Section'];
        }
    }
    $fetch_SUP    =  mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `SubSection_id` = '$sec_id'");
    while ($rowSup = mysqli_fetch_assoc($fetch_SUP)) {
        if ($rowSup["SubSection"] != ""
        ) {
            $sc_name = $rowSup['SubSection'];
        }
    }
    $fetch_GR     =  mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sec_id'");
    while ($rowGr = mysqli_fetch_assoc($fetch_GR)) {
        if ($rowGr["Group"] != "") {
            $sc_name = $rowGr['Group'];
        }
    }
    $fetch_Line   =  mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sec_id'");
    while ($rowLine = mysqli_fetch_assoc($fetch_Line)) {
        if ($rowLine["Line"] != ""
        ) {
            $sc_name = $rowLine['Line'];
        }
    }

?>