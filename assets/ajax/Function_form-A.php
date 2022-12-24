<?php 

//: Convert ID > Name [ Shift ] 
$Shift_id       = $_POST['hidden_mts_sf_name'][$count];
$resultSFT1 = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM shift WHERE Shift_name = '".$Shift_id."'");
$rowSFT1    = mysqli_fetch_array($resultSFT1);
$SFT1       = $rowSFT1['Shift_ID'];
//: Convert ID > Name [ Shift ]
$SFT2 = $_POST['hidden_shift'][$count];
$resultSFT2 = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM shift WHERE Shift_name = '".$SFT2."'");
$rowSFT2    = mysqli_fetch_array($resultSFT2);
$SFT2       = $rowSFT2['Shift_ID'];
//: Convert ID > Name [ Section ]
$sc = $_POST['hidden_sc_name'][$count];
$fetch_DV     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Division` = '$sc'");
while ($rowdv = mysqli_fetch_assoc($fetch_DV)) {
    if ($rowdv["Division_id"] != "") {
        $sc_name = $rowdv['Division_id'];
    }
}
$fetch_DP     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Department` = '$sc'");
while ($rowdp = mysqli_fetch_assoc($fetch_DP)) {
    if ($rowdp["Department_id"] != "") {
        $sc_name = $rowdp['Department_id'];
    }
}
$fetch_SC     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Section` = '$sc'");
while ($rowSc = mysqli_fetch_assoc($fetch_SC)) {
    if ($rowSc["Section_id"] != "") {
        $sc_name = $rowSc['Section_id'];
    }
}
$fetch_SUP    =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `SubSection` = '$sc'");
while ($rowSup = mysqli_fetch_assoc($fetch_SUP)) {
    if ($rowSup["SubSection_id"] != "") {
        $sc_name = $rowSup['SubSection_id'];
    }
}
$fetch_GR     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Group` = '$sc'");  
while ($rowGr = mysqli_fetch_assoc($fetch_GR)) {
    if ($rowGr["Group_id"] != "") {
        $sc_name = $rowGr['Group_id'];
    }
}
$fetch_Line   =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Line` = '$sc'");
while ($rowLine = mysqli_fetch_assoc($fetch_Line)) {
    if ($rowLine["Line_id"] != "") {
        $sc_name = $rowLine['Line_id'];
    }
}



?>