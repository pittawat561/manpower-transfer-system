<?php 

$id = $row1["Emp_ID"];  

$empdata3 = $connDB_DBMC->query("SELECT * FROM employee AS emp 
INNER JOIN position as pos ON emp.Position_ID = pos.Position_ID 
INNER JOIN shift as sh ON emp.Shift_ID = sh.Shift_ID
WHERE Emp_ID = '$id'");
$row3 = $empdata3->fetch_assoc();

$ids = $row1['Supervisor_Code'];
$empdata4 = $connDB_DBMC->query("SELECT * FROM employee AS emp INNER JOIN position as pos ON emp.Position_ID = pos.Position_ID WHERE Emp_ID = '$ids'");
$row4 = $empdata4->fetch_assoc();

$sql002 = $connDB_MTS->query("SELECT * FROM mts_document AS doc INNER JOIN mts_sal AS sal ON doc.SAL = sal.sal_id WHERE Document_num='$doc'");
$row002 = $sql002->fetch_assoc();

if($row3["Sectioncode_ID"] != "-"){
    $sc = $row3["Sectioncode_ID"];
    $employee_DV = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc'");
    $employee_DP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sc'");
    $employee_SC = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc'");
    $employee_SUP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc'");
    $employee_GR = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sc'");
    $employee_LINE = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sc'");
    while ($row_dv = mysqli_fetch_assoc($employee_DV)) { if ($row_dv["Division"] != "") { $sc_name = $row_dv['Division']; } }
    while ($row_dp = mysqli_fetch_assoc($employee_DP)) { if ($row_dp["Department"] != "") { $sc_name = $row_dp['Department']; } }
    while ($row_sc = mysqli_fetch_assoc($employee_SC)) { if ($row_sc["Section"] != "") { $sc_name = $row_sc['Section']; } }
    while ($row_sup = mysqli_fetch_assoc($employee_SUP)) { if ($row_sup["SubSection"] != "") { $sc_name = $row_sup['SubSection']; } }
    while ($row_gr = mysqli_fetch_assoc($employee_GR)) { if ($row_gr["Group"] != "") { $sc_name = $row_gr['Group']; } } 
    while ($row_line = mysqli_fetch_assoc($employee_LINE)) { if ($row_line["Line"] != "") { $sc_name = $row_line['Line']; } }
}else{
    $sc_name = "-";
}
if($row1["mts_Sectioncode_ID"] != "-"){
    $sc1 = $row1["mts_Sectioncode_ID"];
    $employee_DV = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc1'");
    $employee_DP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sc1'");
    $employee_SC = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc1'");
    $employee_SUP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc1'");
    $employee_GR = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sc1'");
    $employee_LINE = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sc1'");
    while ($row_dv = mysqli_fetch_assoc($employee_DV)) { if ($row_dv["Division"] != "") { $sc_name1 = $row_dv['Division']; } }
    while ($row_dp = mysqli_fetch_assoc($employee_DP)) { if ($row_dp["Department"] != "") { $sc_name1 = $row_dp['Department']; } }
    while ($row_sc = mysqli_fetch_assoc($employee_SC)) { if ($row_sc["Section"] != "") { $sc_name1 = $row_sc['Section']; } }
    while ($row_sup = mysqli_fetch_assoc($employee_SUP)) { if ($row_sup["SubSection"] != "") { $sc_name1 = $row_sup['SubSection']; } }
    while ($row_gr = mysqli_fetch_assoc($employee_GR)) { if ($row_gr["Group"] != "") { $sc_name1 = $row_gr['Group']; } } 
    while ($row_line = mysqli_fetch_assoc($employee_LINE)) { if ($row_line["Line"] != "") { $sc_name1 = $row_line['Line']; } }
}else{
    $sc_name1 = "-";
}

$sec_id = $row1['Sectioncode_ID'];
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

$sec_id1 = $row3['Sectioncode_ID'];
$cut3 = substr("$sec_id", 4, -4);
if($cut3 == 'DP'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept);
    $dept3 = $rowdept['Department'];
    $com3 = $rowdept['Company_id'];
}else if($cut3 == 'SC'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept);
    $dept3 = $rowdept['Department'];
    $com3 = $rowdept['Company_id'];
}else if($cut3 == 'SB'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept);
    $dept3 = $rowdept['Department'];
    $com3 = $rowdept['Company_id'];
}else if($cut3 == 'LN'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept); 
    $dept3 = $rowdept['Department'];
    $com3 = $rowdept['Company_id'];
}else if($cut3 == 'GR'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept); 
    $dept3 = $rowdept['Department'];
    $com3 = $rowdept['Company_id'];
}else if($cut3 == 'DV'){
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept);
    $dept3 = "-";
    $com3 = $rowdept['Company_id'];
}else{
    $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$sec_id1'");
    $rowdept=mysqli_fetch_array($resultdept);
    $dept3 = "-";
    $com3 = $rowdept['Company_id'];
}

//* fetch ✔ SHIFT 1
$shift_ID = $row1["mts_Shift_ID"];
$sql003 = $connDB_DBMC->query("SELECT * FROM Shift WHERE Shift_ID ='$shift_ID'");
$row003 = $sql003->fetch_assoc();
$Shift_name = $row003['Shift_name'];
    
echo '
<tr>
    <td>' . $i++ . '</td>
    <td>' . $row1["Emp_ID"] . '</td>
    <td>'.$row3["Empname_engTitle"].' '.$row3["Empname_eng"].' '.$row3["Empsurname_eng"].'</td>
    <td>
        <a class="btn btn-success btn-xl" data-bs-toggle="collapse" href="#cs_' . $row1["Emp_ID"] . '" role="button"
            aria-expanded="false" aria-controls="cs_' . $row1["Emp_ID"] . '"><i class="ti-zoom-in"></i> View</a>
    </td>
</tr>';

echo '
<tr class="collapse" id="cs_' . $row1["Emp_ID"] . '" style="background-color: #fbfbfb;">
    <td colspan="4">';
    if($row1["Form_ID"] == 1){
        echo  '
        <div class="col-12 row">
            <div class="col-4">
                <lable>ระดับพนักงาน: <a>' . $row1["mts_Personal_grade"] . '</a></lable>
                <p>' . $row3["Personal_grade"] . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row3["Sectioncode_ID"] . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row3["CostCenter_ID"] . '</p>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row3["Position_name"] . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row3["Section_type"] . '</p>
                <lable>วันที่มีผลบังคับใช้: <a>' . $row002["EFF_Date"] . '</a></lable>
                <p></p>
            </div>
            <div class="col-4">
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $row3["Shift_name"] . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
            </div>
            <hr>
            <lable>ผู้บังคับบัญชา</lable>
            <div class="row col-12">
                <div class="col-3">
                    <lable>รหัสพนักงาน: <a>' . $row1["Supervisor_Code"] . '</a></lable>
                </div>
                <div class="col-9">
                    <lable>ชื่อ-สกุล: <a>'.$row4["Empname_engTitle"].' '.$row4["Empname_eng"].' '.$row4["Empsurname_eng"].'</a></lable>
                </div>
            </div>
        </div>
        ';
    
    }elseif($row1["Form_ID"] == 2){
        echo '
        <div class="col-12 row">
            <div class="col-4">
                <lable>ระดับพนักงาน: <a>' . $row1["mts_Personal_grade"] . '</a></lable>
                <p>' . $row3["Personal_grade"] . '</p>
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $row3["Shift_name"] . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row3["Position_name"] . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row3["Sectioncode_ID"] . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row3["CostCenter_ID"] . '</p>
                <p></p>
            </div>
            <div class="col-4">
                <lable>แผนก: <a>' . $dept . '</a></lable>
                <p>' . $dept3 . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row3["Section_type"] . '</p>
                <lable>วันที่มีผลบังคับใช้: <a>' . $row002["EFF_Date"] . '</a></lable>
            </div>
            <hr>
            <lable>ผู้บังคับบัญชา</lable>
            <div class="row col-12">
                <div class="col-3">
                    <lable>รหัสพนักงาน: <a>' . $row1["Supervisor_Code"] . '</a></lable>
                </div>
                <div class="col-9">
                    <lable>ชื่อ-สกุล: <a>'.$row4["Empname_engTitle"].' '.$row4["Empname_eng"].' '.$row4["Empsurname_eng"].'</a></lable>
                </div>
            </div>
        </div>
    ';
    }elseif($row1["Form_ID"] == 3){
        echo '
        <div class="col-12 row">
            <div class="col-4">
                <lable>ระดับพนักงาน: <a>' . $row1["mts_Personal_grade"] . '</a></lable>
                <p>' . $row3["Personal_grade"] . '</p>
                <lable>แผนก: <a>' . $dept . '</a></lable>
                <p>' . $dept3 . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row3["Section_type"] . '</p>
                <lable>วันที่มีผลบังคับใช้: <a>' . $row1["EFF_Date"] . '</a></lable>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row3["Position_name"] . '</p>
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row3["CostCenter_ID"] . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
                <p></p>
            </div>
            <div class="col-4">
                <lable>บริษัท: <a>' . $com . '</a></lable>
                <p>' . $com3 . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row3["Sectioncode_ID"] . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $row3["Shift_name"] . '</p>
            </div>
            <hr>
            <lable>ผู้บังคับบัญชา</lable>
            <div class="row col-12">
                <div class="col-3">
                    <lable>รหัสพนักงาน: <a>' . $row1["Supervisor_Code"] . '</a></lable>
                </div>
                <div class="col-9">
                <lable>ชื่อ-สกุล: <a>'.$row4["Empname_engTitle"].' '.$row4["Empname_eng"].' '.$row4["Empsurname_eng"].'</a></lable>
                </div>
            </div>
        </div>
    ';
    }

echo '</td>
</tr>';

$apf = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc='$doc' AND mtsAP_status = 1");
$row400 = $apf->fetch_assoc();
// type="hidden"
echo '
<input type="hidden" name="doc_num" id="doc_num" value="'.$doc.'">
<input type="hidden" name="empid" id="empid" value="'.$objResult["Emp_ID"].'">
<input type="hidden" name="step" id="step" value="'.$row400["mtsAP_step"].'">
<input type="hidden" name="role" id="role" value="'.$row400["mtsAP_role"].'">
<input type="hidden" name="create" id="create" value="'.$row1["Create_By"].'">
';
?>