<?php  
//export.php  
include "../service/DB-Config.php";

$fileName = "mts_" . date('Y-m-d') . ".xls"; 
header("Content-type: text/css ; charset: UTF-8");
header('Content-type: text/csv; charset=UTF-8');  

//# CSS
$output = '
<style type="text/css">
table {
    table-layout: fixed;
    width: 2980px;
    font-family: Arial, Helvetica, sans-serif !important;
    font-family: Arial, sans-serif;
}
.tg {
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0px auto;
}

.tg td {
    font-size: 14px;
    overflow: hidden;
    padding: 10px 5px;
    word-break: normal;
}

.tg th {
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    padding: 10px 5px;
    word-break: normal;
}

.tg .tg-k34g {
    background-color: #ffffff;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-pb6i {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    position: -webkit-sticky;
    text-align: right;
    top: -1px;
    vertical-align: bottom;
    will-change: transform
}

.tg .tg-wbq3 {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 22px;
    position: -webkit-sticky;
    text-align: center;
    top: -1px;
    vertical-align: middle;
    will-change: transform
}

.tg .tg-eteu {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 11px;
    text-align: left;
    vertical-align: bottom
}

.tg .tg-10la {
    background-color: #ffffff;
    font-size: 11px;
    text-align: center;
    vertical-align: middle;
    padding: 15px 10px 15px 10px;
}

.tg .tg-la4h {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 11px;
    font-weight: bold;
    text-align: left;
    vertical-align: middle
}

.tg .tg-zf4g {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 11px;
    text-align: left;
    vertical-align: middle
}

.tg .tg-zwqf {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    position: -webkit-sticky;
    text-align: left;
    top: -1px;
    vertical-align: bottom;
    will-change: transform
}

.tg .tg-5n8h {
    background-color: #ffffff;
    font-size: 11px;
    text-align: center;
    vertical-align: middle
}

.tg .tg-7829 {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    position: -webkit-sticky;
    text-align: center;
    top: -1px;
    vertical-align: middle;
    will-change: transform
}

.tg .tg-zkau {
    background-color: #efefef;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: bottom
}

.tg .tg-hfs3 {
    background-color: #d3d3d3;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-q546 {
    background-color: #d3d3d3;

    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-owsj {
    background-color: #d3d3d3;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-hcpu {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 11px;
    text-align: center;
    vertical-align: middle
}

.tg .tg-pqke {
    background-color: #ffffff;
    font-size: 11px;
    font-weight: bold;
    text-align: left;
    vertical-align: middle
}
</style>
';


if(isset($_POST["export"])){
//#
$doc_id = $_POST['doc'];
$sql001 = $connDB_MTS->query("SELECT * FROM mts_document WHERE Document_num = '".$doc_id."' ");
$row001 = $sql001->fetch_array();

$output .='
<table class="tg" border="1">
    <colgroup>
        <col style="width: 50px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
        <col style="width: 100px">
    </colgroup>
    <thead>
        <tr>
            <th class="tg-wbq3" colspan="28" rowspan="2">แบบฟอร์มการโอนย้ายอัตรากำลังคนข้ามบริษัท<br><span
                    style="color:#C0C0C0">Requisition of Manpower Transfer cross Company</span></th>
            <th class="tg-7829" colspan="2" rowspan="3">' .' '.$row001['Form_Company'].'</th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th class="tg-zwqf" colspan="14">วันที่กรอกเอกสาร Date :' .' '.substr($row001['Date'],0,10).'</th>
            <th class="tg-pb6i" colspan="14">เลขที่ HR :' .' '.$row001['HR_Code'].'</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="tg-zkau" rowspan="2">ลำดับ<br>No.</td>
            <td class="tg-zkau" rowspan="2">รหัสพนักงาน<br>Emp. Code</td>
            <td class="tg-zkau" colspan="2" rowspan="2">ชื่อ - นามสกุล<br>Name - Surname</td>
            <td class="tg-hfs3" colspan="10">สังกัดปัจจุบัน / Current</td>
            <td class="tg-hfs3" colspan="11">สังกัดใหม่ / New</td>
            <td class="tg-q546" colspan="3">ผู้บังคับบัญชาโดยตรง<br>Direct Superior *(4)</td>
            <td class="tg-zkau" colspan="2" rowspan="2">สาเหตุการย้าย<br>Reason transfer</td>
        </tr>
        <tr>
            <td class="tg-zkau">ระดับพนักงาน<br>Grade</td>
            <td class="tg-zkau">ตำแหน่ง<br>Position</td>
            <td class="tg-zkau">บริษัท<br>Company</td>
            <td class="tg-zkau">แผนก<br>Department</td>
            <td class="tg-zkau" colspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
            <td class="tg-zkau">รหัสหน่วยงาน<br>Section ID</td>
            <td class="tg-zkau">ประเภทงาน<br>Type</td>
            <td class="tg-zkau">รหัสศูนย์ต้นทุน<br>Cost center</td>
            <td class="tg-zkau">กะ<br>Shift</td>
            <td class="tg-zkau">ระดับพนักงาน<br>Grade</td>
            <td class="tg-zkau">ตำแหน่ง<br>Position</td>
            <td class="tg-zkau">บริษัท<br>Company</td>
            <td class="tg-zkau">แผนก<br>Department</td>
            <td class="tg-zkau" colspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
            <td class="tg-zkau">รหัสหน่วยงาน<br>Section ID</td>
            <td class="tg-zkau">ประเภทงาน<br>Type</td>
            <td class="tg-zkau">รหัสศูนย์ต้นทุน<br>Cost center</td>
            <td class="tg-zkau">กะ<br>Shift</td>
            <td class="tg-zkau">วันที่มีผลบังคับใช้<br>Effective date *(3)</td>
            <td class="tg-zkau">รหัสพนักงาน<br>Emp.Code</td>
            <td class="tg-zkau" colspan="2">ชื่อ-สกุล<br>Name-Surname</td>
        </tr>';

//! =========================================================================================================
$sql002 = $connDB_MTS->query("SELECT * FROM mts_previousinfo AS pre INNER JOIN mts_employee AS emp ON pre.emp_id = emp.Emp_ID AND pre.Document_num = emp.Document_num WHERE pre.Document_num = '".$doc_id."' ");
while ($row002 = $sql002->fetch_array()) {
    $rows2[] = $row002;
    $i = 1;
};
foreach ($rows2 as $row002) {

//! =========================================================================================================
//: Convert ID > Name [ NAME ]
$sql = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$row002['emp_id']."' ");
$row = $sql->fetch_array();
$Name = $row['Empname_engTitle'].' '.$row['Empname_eng'].' '.$row['Empsurname_eng'];
//: Convert ID > Name [ SECTION ]
$sec1_id = $row002['Sectioncode_ID'];
if($sec1_id != "-"){
    $employee_DV    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sec1_id'");
    $employee_DP    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sec1_id'");
    $employee_SC    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sec1_id'");
    $employee_SUP   = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sec1_id'");
    $employee_GR    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sec1_id'");
    $employee_LINE  = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sec1_id'");
    while ($row_dv =    $employee_DV->fetch_array())    { if ($row_dv["Division"] != "")    { $sc_name1 = $row_dv['Division']; } }
    while ($row_dp =    $employee_DP->fetch_array())    { if ($row_dp["Department"] != "")  { $sc_name1 = $row_dp['Department']; } }
    while ($row_sc =    $employee_SC->fetch_array())    { if ($row_sc["Section"] != "")     { $sc_name1 = $row_sc['Section']; } }
    while ($row_sup =   $employee_SUP->fetch_array())   { if ($row_sup["SubSection"] != "") { $sc_name1 = $row_sup['SubSection']; } }
    while ($row_gr =    $employee_GR->fetch_array())    { if ($row_gr["Group"] != "")       { $sc_name1 = $row_gr['Group']; } } 
    while ($row_line =  $employee_LINE->fetch_array())  { if ($row_line["Line"] != "")      { $sc_name1 = $row_line['Line']; } }
}else{
    $sc_name1 = "-";
};
//: Convert ID > Name [ Shift ] 
$Shift1_id = $row002['Shift_ID'];
$Shift_1 = $connDB_DBMC->query("SELECT DISTINCT * FROM shift WHERE Shift_ID = '".$Shift1_id."'");
$rowSH1 = $Shift_1->fetch_array();
$Shift1 = $rowSH1['Shift_name'];
//! =========================================================================================================
//: Convert ID > Name [ NAME ]
$sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$row002['Supervisor_Code']."' ");
$row1 = $sql1->fetch_array();
$Name1 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];

$sec2_id = $row002['mts_Sectioncode_ID'];
if($sec2_id != "-"){
    $employee_DV    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sec2_id'");
    $employee_DP    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sec2_id'");
    $employee_SC    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sec2_id'");
    $employee_SUP   = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sec2_id'");
    $employee_GR    = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sec2_id'");
    $employee_LINE  = $connDB_DBMC->query("SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sec2_id'");
    while ($row_dv =    $employee_DV->fetch_array())    { if ($row_dv["Division"] != "")    { $sc_name2 = $row_dv['Division']; } }
    while ($row_dp =    $employee_DP->fetch_array())    { if ($row_dp["Department"] != "")  { $sc_name2 = $row_dp['Department']; } }
    while ($row_sc =    $employee_SC->fetch_array())    { if ($row_sc["Section"] != "")     { $sc_name2 = $row_sc['Section']; } }
    while ($row_sup =   $employee_SUP->fetch_array())   { if ($row_sup["SubSection"] != "") { $sc_name2 = $row_sup['SubSection']; } }
    while ($row_gr =    $employee_GR->fetch_array())    { if ($row_gr["Group"] != "")       { $sc_name2 = $row_gr['Group']; } } 
    while ($row_line =  $employee_LINE->fetch_array())  { if ($row_line["Line"] != "")      { $sc_name2 = $row_line['Line']; } }
}else{
    $sc_name2 = "-";
};
//! =========================================================================================================

//: Convert ID > Name [ Shift ] 
$Shift2_id = $row002['mts_Shift_ID'];
$Shift_2 = $connDB_DBMC->query("SELECT DISTINCT * FROM shift WHERE Shift_ID = '".$Shift2_id."'");
$rowSH2 = $Shift_2->fetch_array();
$Shift2 = $rowSH2['Shift_name'];
//! =========================================================================================================

$dept_ID = $row002['Department_ID'];
    $cut = substr("$dept_ID", 4, -4);
    if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SC'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'SB'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'LN'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'GR'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept = $rowdept['Department'];
        $com = $rowdept['Company_id'];
    }else if($cut == 'DV'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    }else{
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$dept_ID'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept = "-";
        $com = $rowdept['Company_id'];
    };


//! ========================================================================================================= 
$dept_ID1 = $row002['mts_Department_ID'];
    $cut = substr("$dept_ID1", 4, -4);
    if($cut == 'DP'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Department_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
    }else if($cut == 'SC'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Section_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
    }else if($cut == 'SB'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE SubSection_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = $rowdept['Department'];
    }else if($cut == 'LN'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Line_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept1 = $rowdept['Department'];
    }else if($cut == 'GR'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Group_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept); 
        $dept1 = $rowdept['Department'];
    }else if($cut == 'DV'){
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Division_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = "-";
    }else{
        $resultdept = mysqli_query($connDB_DBMC, "SELECT * FROM master_mapping WHERE Company_id = '$dept_ID1'");
        $rowdept=mysqli_fetch_array($resultdept);
        $dept1 = "-";
    };


//! ========================================================================================================= 
$output .='
        <tr>
            <td class="tg-10la">'.$i++.'</td>
            <td class="tg-10la">'.$row002['emp_id'].'</td>
            <td class="tg-10la" colspan="2">'.$Name.'</td>
            <td class="tg-10la">'.$row002['Personal_grade'].'</td>
            <td class="tg-10la">'.$row002['Position_name'].'</td>
            <td class="tg-10la">'.$row002['Company_ID'].'</td>
            <td class="tg-10la">'.$dept.'</td>
            <td class="tg-10la" colspan="2">'.$sc_name1.'</td>
            <td class="tg-10la">'.$row002['Sectioncode_ID'].'</td>
            <td class="tg-10la">'.$row002['Section_type'].'</td>
            <td class="tg-10la">'.$row002['CostCenter_ID'].'</td>
            <td class="tg-10la">'.$Shift1.'</td>
            <td class="tg-10la">'.$row002['mts_Personal_grade'].'</td>
            <td class="tg-10la">'.$row002['mts_Position_name'].'</td>
            <td class="tg-10la">'.$row002['mts_Company_ID'].'</td>
            <td class="tg-10la">'.$dept1.'</td>
            <td class="tg-10la" colspan="2">'.$sc_name2.'</td>
            <td class="tg-10la">'.$row002['mts_Sectioncode_ID'].'</td>
            <td class="tg-10la">'.$row002['mts_Section_type'].'</td>
            <td class="tg-10la">'.$row002['mts_CostCenter_ID'].'</td>
            <td class="tg-10la">'.$Shift2.'</td>
            <td class="tg-10la">'.$row001['EFF_Date'].'</td>
            <td class="tg-10la">'.$row002['Supervisor_Code'].'</td>
            <td class="tg-10la" colspan="2">'.$Name1.'</td>
            <td class="tg-10la" colspan="2">'.$row002['reason_tranfer'].'</td>
        </tr>
';
}

$sqlAP01 = $connDB_MTS->query("SELECT * FROM mts_apf AS apf INNER JOIN mts_document AS doc ON apf.mtsAP_doc = doc.Document_num WHERE apf.mtsAP_doc = '".$doc_id."'");
$rowAP01 = $sqlAP01->fetch_assoc();
$SAL = $rowAP01['SAL'];
if($SAL == 1){
    $salP = 'Follow';
}elseif($SAL == 2){
    $salP = 'Over';
};

$create = $rowAP01['Create_By'];
$sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$create ."' ");
$row1 = $sql1->fetch_array();
$AP0 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
$date0 = substr($rowAP01['Date'],0,10);

$sqlAP1 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc = '".$doc_id."'");
while ($rowAP1 = $sqlAP1->fetch_assoc()){
$step = $rowAP1['mtsAP_step'];
$group = $rowAP1['mtsAP_group'];

if($step == 1 && $group == 1){
    $date1 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP1 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 2 && $group == 1){
    $date2 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP2 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 3 && $group == 1){
    $date3 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP3 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 4 && $group == 2){
    $date4 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP4 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 5 && $group == 2){
    $date5 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP5 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 6 && $group == 9){
    $date6 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP6 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 7 && $group == 9){
    $date7 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP7 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 8 && $group == 9){
    $date8 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP8 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 9 && $group == 9){
    $date9 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP9 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 10 && $group == 4){
    $date10 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP10 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 11 && $group == 4){
    $date11 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP11 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 12 && $group == 5){
    $date12 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP12 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 13 && $group == 5){
    $date13 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP13 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 14 && $group == 6){
    $date14 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP14 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 15 && $group == 6){
    $date15 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP15 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 16 && $group == 6){
    $date16 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP16 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
};
};
$output .='      
        <tr>
            <td class="tg-eteu" rowspan="12"></td>
            <td class="tg-la4h" colspan="29">หมายเหตุ: Remark</td>
        </tr>
        <tr>
            <td class="tg-zf4g" colspan="29">*(1) บริษัทต้นสังกัดส่งเอกสารที่อนุมัติเรียบร้อยแล้วให้แผนก HR Recruitment
                ตรวจสอบ SAL plan<br>Orginal Company have to submit approved form to HR Recruitment for checking SAL Plan
            </td>
        </tr>
        <tr>
            <td class="tg-zf4g" colspan="29">*(2) แผนกที่รับโอนต้องจัดทำ Job Description ให้แผนก HR
                พร้อมกับเอกสารการโอนย้าย<br>New Company have to attach Requisition of Manpower Transfer cross Department
                to HR and Job description<br></td>
        </tr>
        <tr>
            <td class="tg-zf4g" colspan="29">*(3) บริษัทต้นสังกัดหรือบริษัทที่รับโอนต้องส่งเอกสารการโอนย้ายให้แผนก HR
                แก้ไขข้อมูล ก่อนวันที่มีผลบังคับใช้อย่างน้อย 7 วันทำงาน หากล่าช้ากว่าวันที่กำหนดจะมีผลบังคับใช้อีก 7
                วันทำงานถัดไปจากวันที่แผนก HR ได้รับเอกสาร<br>Original Company or new department have to submit
                Requisition of Manpower Transfer cross Department to HR for edit data at least 7 working day in advanced
                (If submit lately,effective date will be next 7 working days.)</td>
        </tr>
        <tr>
            <td class="tg-zf4g" colspan="29">*(4) กรณีจะเปลี่ยนผู้บังคับบัญชาโดยตรง ทางต้นสังกัดต้องทำการแก้ไข
                Organization chart ให้ตรงตามเอกสารการโอนย้าย<br>( In case changing direct superior, department have to
                edit org. to be accurated with transference document.)</td>
        </tr>
        <tr>
            <td class="tg-owsj" colspan="4" rowspan="2">บริษัทต้นสังกัด (Original Company)</td>
            <td class="tg-owsj" colspan="3">แผนกทรัพยากรมนุษย์ (Human Resources Department)</td>
            <td class="tg-owsj" colspan="4" rowspan="2">บริษัทที่รับโอน (New Transfer Company)</td>
            <td class="tg-owsj" colspan="7">แผนกทรัพยากรมนุษย์แก้ไขข้อมูล (Human Resources Department Update data)</td>
            <td class="tg-hcpu" colspan="11" rowspan="7"></td>
        </tr>
        <tr>
            <td class="tg-owsj" colspan="3">Planning &amp; Recruitment</td>
            <td class="tg-owsj" colspan="2">Human Resources</td>
            <td class="tg-owsj" colspan="2">Information Technology</td>
            <td class="tg-owsj" colspan="3">Compensation &amp; Benefit</td>
        </tr>
        <tr>
            <td class="tg-k34g">ผู้ร้องขอ<br>Requester</td>
            <td class="tg-k34g">ตรวจสอบ 1<br>Checked 1</td>
            <td class="tg-k34g">ตรวจสอบ 2<br>Checked 2</td>
            <td class="tg-k34g">อนุมัติ<br>Approved</td>
            <td class="tg-k34g">Checked</td>
            <td class="tg-k34g">SAL &amp;Type</td>
            <td class="tg-k34g">Acknowledge</td>
            <td class="tg-k34g">รับทราบ<br>Acknowledge</td>
            <td class="tg-k34g">ตรวจสอบ 1<br>Checked 1</td>
            <td class="tg-k34g">ตรวจสอบ 2<br>Checked 2</td>
            <td class="tg-k34g">อนุมัติ<br>Approved</td>
            <td class="tg-k34g">Checked</td>
            <td class="tg-k34g">Approved</td>
            <td class="tg-k34g">Edit</td>
            <td class="tg-k34g">Checked</td>
            <td class="tg-k34g">Edit</td>
            <td class="tg-k34g">Checked</td>
            <td class="tg-k34g">Approved</td>
        </tr>
        <tr>
            <td class="tg-5n8h" rowspan="2">'.$AP0.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP1.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP2.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP3.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP4.'</td>
            <td class="tg-5n8h" rowspan="2">'.$salP.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP5.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP6.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP7.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP8.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP9.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP10.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP11.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP12.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP13.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP14.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP15.'</td>
            <td class="tg-5n8h" rowspan="2">'.$AP16.'</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-k34g">Assoicate<br></td>
            <td class="tg-k34g">Head of Department</td>
            <td class="tg-k34g">Head of <br>Division</td>
            <td class="tg-k34g">President</td>
            <td class="tg-k34g">T6 - Senior Staff above</td>
            <td class="tg-5n8h"></td>
            <td class="tg-k34g">Head of<br>Section</td>
            <td class="tg-k34g">Head of<br>Section</td>
            <td class="tg-k34g">Head of Department</td>
            <td class="tg-k34g">Head of <br>Division</td>
            <td class="tg-k34g">President</td>
            <td class="tg-k34g">Head of Department</td>
            <td class="tg-k34g">Head of Division</td>
            <td class="tg-k34g">T8 - Officer<br>above</td>
            <td class="tg-k34g">T6 - Senior Staff<br>above</td>
            <td class="tg-k34g">T8 - Officer<br>above</td>
            <td class="tg-k34g">T6 - Senior Staff<br>above</td>
            <td class="tg-k34g">Head of<br>Section</td>
        </tr>
        <tr>
            <td class="tg-pqke">Date :'.$date0.'</td>
            <td class="tg-pqke">Date :'.$date1.'</td>
            <td class="tg-pqke">Date :'.$date2.'</td>
            <td class="tg-pqke">Date :'.$date3.'</td>
            <td class="tg-pqke">Date :'.$date4.'</td>
            <td class="tg-pqke"></td>
            <td class="tg-pqke">Date :'.$date5.'</td>
            <td class="tg-pqke">Date :'.$date6.'</td>
            <td class="tg-pqke">Date :'.$date7.'</td>
            <td class="tg-pqke">Date :'.$date8.'</td>
            <td class="tg-pqke">Date :'.$date9.'</td>
            <td class="tg-pqke">Date :'.$date10.'</td>
            <td class="tg-pqke">Date :'.$date11.'</td>
            <td class="tg-pqke">Date :'.$date12.'</td>
            <td class="tg-pqke">Date :'.$date13.'</td>
            <td class="tg-pqke">Date :'.$date14.'</td>
            <td class="tg-pqke">Date :'.$date15.'</td>
            <td class="tg-pqke">Date :'.$date16.'</td>
        </tr>
    </tbody>
</table>



';


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
echo $output;

}
?>