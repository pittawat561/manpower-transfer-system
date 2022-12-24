<?php 

if(isset($row1["Emp_ID"])){
    $id = $row1["Emp_ID"];
    $sql = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id'");
    $row = $sql->fetch_assoc();
    $name = $row["Empname_engTitle"].' '.$row["Empname_eng"].' '.$row["Empsurname_eng"];
};
if(isset($row1["Supervisor_Code"])){
    $id = $row1["Supervisor_Code"];
    $sql = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id'");
    $row = $sql->fetch_assoc();
    $name1 = $row["Empname_engTitle"].' '.$row["Empname_eng"].' '.$row["Empsurname_eng"];
};
if(isset($row1["mts_Department_ID"])){
    $dept_id = $row1["mts_Department_ID"];
    $cut = substr("$dept_id", 4, -4);
    if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SC'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SB'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'LN'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'GR'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'DV'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    }else{
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    }
};
if(isset($row1["Department_ID"])){
    $dept_id = $row1["Department_ID"];
    $cut = substr("$dept_id", 4, -4);
    if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SC'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
        $com1 = $rowdept['Company_id'];
    }else if($cut == 'SB'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
        $com1 = $rowdept['Company_id'];
    }else if($cut == 'LN'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept1 = $rowdept['Department'];
        $com1 = $rowdept['Company_id'];
    }else if($cut == 'GR'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept1 = $rowdept['Department'];
        $com1 = $rowdept['Company_id'];
    }else if($cut == 'DV'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = "-";
        $com1 = $rowdept['Company_id'];
    }else{
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$dept_id'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = "-";
        $com1 = $rowdept['Company_id'];
    }
};

if($row1["Sectioncode_ID"] != "-"){
    $sc = $row1["Sectioncode_ID"];
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

if(isset($row1["mts_Shift_ID"])){
//* fetch ✔ SHIFT 1
$shift_ID = $row1["mts_Shift_ID"];
$sql003 = $connDB_DBMC->query("SELECT * FROM Shift WHERE Shift_ID ='$shift_ID'");
$row003 = $sql003->fetch_assoc();
$Shift_name = $row003['Shift_name'];
};

if(isset($row1["Shift_ID"])){
//* fetch ✔ SHIFT 1
$shift_ID = $row1["Shift_ID"];
$sql003 = $connDB_DBMC->query("SELECT * FROM Shift WHERE Shift_ID ='$shift_ID'");
$row003 = $sql003->fetch_assoc();
$Shift_name1 = $row003['Shift_name'];
};



echo '
<tr>
    <td>' . $i++ . '</td>
    <td>' . $row1["Emp_ID"] . '</td>
    <td>' . $name . '</td>
    <td>
        <a class="btn btn-success btn-xl" data-bs-toggle="collapse" href="#cs_' . $row1["Emp_ID"] . '" role="button"
            aria-expanded="false" aria-controls="cs_' . $row1["Emp_ID"] . '"><i class="ti-zoom-in"></i> View</a>
            <a type="button" name="edit" id="'.$row1["Emp_ID"].'" class="btn btn-warning btn-xl edit_data"
            onclick="edit(this.id)" /><i class="ti-pencil"></i> Edit</a>
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
                <p>' . $row1["Personal_grade"] . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row1["Sectioncode_ID"] . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row1["CostCenter_ID"] . '</p>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row1["Position_name"] . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row1["Section_type"] . '</p>
                <lable>วันที่มีผลบังคับใช้: <a>' . $row1["EFF_Date"] . '</a></lable>
                <p></p>
            </div>
            <div class="col-4">
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $Shift_name1 . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
            </div>
            <hr>
            <lable>ผู้บังคับบัญชา</lable>
            <div class="row col-12">
                <div class="col-3">
                    <lable>รหัสพนักงาน: <a>' . $row1["Supervisor_Code"] . '</a></lable>
                </div>
                <div class="col-9">
                    <lable>ชื่อ-สกุล: <a>'.$name1.'</a></lable>
                </div>
            </div>
        </div>
        ';
    
    }elseif($row1["Form_ID"] == 2){
        echo '
        <div class="col-12 row">
            <div class="col-4">
                <lable>ระดับพนักงาน: <a>' . $row1["mts_Personal_grade"] . '</a></lable>
                <p>' . $row1["Personal_grade"] . '</p>
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $Shift_name1 . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row1["Position_name"] . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row1["Sectioncode_ID"] . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row1["CostCenter_ID"] . '</p>
                <p></p>
            </div>
            <div class="col-4">
                <lable>แผนก: <a>' . $dept . '</a></lable>
                <p>' . $dept3 . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row1["Section_type"] . '</p>
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
                <p>' . $row1["Personal_grade"] . '</p>
                <lable>แผนก: <a>' . $dept . '</a></lable>
                <p>' . $dept1 . '</p>
                <lable>ประเภทงาน: <a>' . $row1["mts_Section_type"] . '</a></lable>
                <p>' . $row1["Section_type"] . '</p>
                <lable>วันที่มีผลบังคับใช้: <a>' . $row1["EFF_Date"] . '</a></lable>
            </div>
            <div class="col-4">
                <lable>ตำแหน่ง: <a>' . $row1["mts_Position_name"] . '</a></lable>
                <p>' . $row1["Position_name"] . '</p>
                <lable>ชื่อหน่วยงาน: <a>' . $sc_name1 . '</a></lable>
                <p>' . $sc_name . '</p>
                <lable>รหัสศูนย์ต้นทุน: <a>' . $row1["mts_CostCenter_ID"] . '</a></lable>
                <p>' . $row1["CostCenter_ID"] . '</p>
                <lable>สาเหตุการย้าย: <a>' . $row1["reason_tranfer"] . '</a></lable>
                <p></p>
            </div>
            <div class="col-4">
                <lable>บริษัท: <a>' . $row1["mts_Company_ID"] . '</a></lable>
                <p>' . $row1["Company_ID"] . '</p>
                <lable>รหัสหน่วยงาน: <a>' . $row1["mts_Sectioncode_ID"] . '</a></lable>
                <p>' . $row1["Sectioncode_ID"] . '</p>
                <lable>กะเวลาเข้างาน: <a>' . $Shift_name . '</a></lable>
                <p>' . $Shift_name1 . '</p>
            </div>
            <hr>
            <lable>ผู้บังคับบัญชา</lable>
            <div class="row col-12">
                <div class="col-3">
                    <lable>รหัสพนักงาน: <a>' . $row1["Supervisor_Code"] . '</a></lable>
                </div>
                <div class="col-9">
                <lable>ชื่อ-สกุล: <a>'.$name1.'</a></lable>
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

