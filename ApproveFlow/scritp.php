<?php 


$id = $row["emp_id"];
$Supervisor_Code = $row["Supervisor_Code"];
// $sc = $row["Sectioncode_ID"];

//* fetch NAME ✔
$fetch_name1 = mysqli_query($connDB_DBMC, "SELECT * FROM employee WHERE Emp_id='$id'");
$row_name1 = mysqli_fetch_array($fetch_name1);
$name1 = $row_name1["Empname_engTitle"] . ' ' . $row_name1["Empname_eng"] . ' ' . $row_name1["Empsurname_eng"];
//* fetch NAME ✔
$fetch_name2 = mysqli_query($connDB_DBMC, "SELECT * FROM employee WHERE Emp_id='$Supervisor_Code'");
$row_name2 = mysqli_fetch_array($fetch_name2);
$name2 = $row_name2["Empname_engTitle"] . ' ' . $row_name2["Empname_eng"] . ' ' . $row_name2["Empsurname_eng"];
//! fetch EMP ✔
if($row["Sectioncode_ID"] != "-"){
$sc = $row["Sectioncode_ID"];
$employee_DV = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc'");
$employee_DP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sc'");
$employee_SC = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc'");
$employee_SUP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc'");
$employee_GR = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sc'");
$employee_LINE = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sc'");
while ($row_dv = mysqli_fetch_assoc($employee_DV)) {
if ($row_dv["Division"] != "") {
$sc_name = $row_dv['Division'];
}
}
while ($row_dp = mysqli_fetch_assoc($employee_DP)) {
if ($row_dp["Department"] != "") {
$sc_name = $row_dp['Department'];
}
}
while ($row_sc = mysqli_fetch_assoc($employee_SC)) {
if ($row_sc["Section"] != "") {
$sc_name = $row_sc['Section'];
}
}
while ($row_sup = mysqli_fetch_assoc($employee_SUP)) {
if ($row_sup["SubSection"] != "") {
$sc_name = $row_sup['SubSection'];
}
}
while ($row_gr = mysqli_fetch_assoc($employee_GR)) {
if ($row_gr["Group"] != "") {
$sc_name = $row_gr['Group'];
}
}
while ($row_line = mysqli_fetch_assoc($employee_LINE)) {
if ($row_line["Line"] != "") {
$sc_name = $row_line['Line'];
}
}
}else{
    $sc_name = "-";
}

//* fetch (●'◡'●) Previousinfo ✔
$previousinfo_DV = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc_p'");
$previousinfo_DP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sc_p'");
$previousinfo_SC = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc_p'");
$previousinfo_SUP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc_p'");
$previousinfo_GR = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sc_p'");
$previousinfo_LINE = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sc_p'");
while ($row_dv = mysqli_fetch_assoc($previousinfo_DV)) {
if ($row_dv["Division"] != "") {
$sc_namesc_p = $row_dv['Division'];
}
}
while ($row_dp = mysqli_fetch_assoc($previousinfo_DP)) {
if ($row_dp["Department"] != "") {
$sc_namesc_p = $row_dp['Department'];
}
}
while ($row_sc = mysqli_fetch_assoc($previousinfo_SC)) {
if ($row_sc["Section"] != "") {
$sc_namesc_p = $row_sc['Section'];
}
}
while ($row_sup = mysqli_fetch_assoc($previousinfo_SUP)) {
if ($row_sup["SubSection"] != "") {
$sc_namesc_p = $row_sup['SubSection'];
}
}
while ($row_gr = mysqli_fetch_assoc($previousinfo_GR)) {
if ($row_gr["Group"] != "") {
$sc_namesc_p = $row_gr['Group'];
}
}
while ($row_line = mysqli_fetch_assoc($previousinfo_LINE)) {
if ($row_line["Line"] != "") {
$sc_namesc_p = $row_line['Line'];
}
}
//* fetch ✔ SHIFT 1
$shift_1    = $row["Shift_ID"];
$shift1     = mysqli_query($connDB_DBMC,  "SELECT * FROM Shift WHERE Shift_ID ='$shift_1'");
$row_s1     = mysqli_fetch_array($shift1);
$SHF1       =  $row_s1['Shift_name'];
//* fetch ✔ SHIFT 2
$shift_2    = $row_p["Shift_ID"];
$shift2     = mysqli_query($connDB_DBMC,  "SELECT * FROM Shift WHERE Shift_ID ='$shift_2'");
$row_s2     = mysqli_fetch_array($shift2);
$SHF2       =  $row_s2['Shift_name'];















?>