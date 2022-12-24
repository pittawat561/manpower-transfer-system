<?php

$Emp_ID = $_GET['Emp_ID'];

include "../../service/DB-Config.php";

if ($Emp_ID !== "") {

    $query = mysqli_query($connDB_DBMC, "SELECT * FROM employee as emp
    INNER JOIN position as pt ON emp.Position_ID = pt.Position_ID
    INNER JOIN shift as sf ON emp.Shift_ID = sf.Shift_ID
    WHERE Emp_ID='$Emp_ID'
    ");

    $row = mysqli_fetch_array($query);

    include 'Function_autofill.php';

    $emp_name = $row["Empname_engTitle"].' '.$row["Empname_eng"].' '.$row["Empsurname_eng"]; 
    $psn_gr = $row["Personal_grade"];       //ระดับพนักงาน
    $pos_name = $row["Position_name"];      //ตำแหน่ง
    $sc_code = $row["Sectioncode_ID"];      //รหัสหน่วยงาน
    $sc_type = $row["Section_type"];        //ประเภท
    $CostCenter_ID = $row["CostCenter_ID"]; //รหัสศูนย์
    $shift = $row["Shift_name"];            //กะ

}


// Store it in a array
$result = array(

    "$emp_name",
    "$psn_gr",
    "$pos_name",
    "$sc_name",
    "$sc_code",
    "$sc_type",
    "$CostCenter_ID",
    "$shift"


);

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;





?>