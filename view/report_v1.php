<?php  
//export.php  
include '../service/DB-Config.php';

$fileName = "mts_" . date('Y-m-d') . ".xls"; 
header("Content-type: text/css ; charset: UTF-8");
header("Content-type: text/csv; charset=UTF-8");  

//# CSS
$output ='
<style type="text/css">
table {
    table-layout: fixed;
    width: 2571px;
}
.tg {
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0px auto;
    font-family: Arial, Helvetica, sans-serif !important;
    font-family: Arial, sans-serif;
}

.tg td {
    font-size: 14px;
    overflow: hidden;
    padding: 10px 3px;
    word-break: normal;
}

.tg th {
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    padding: 10px 3px;
    word-break: normal;
}

.tg .tg-k34g {
    background-color: #ffffff;
    font-size: 11px;
    text-align: center;
    vertical-align: middle
}

.tg .tg-hnhj {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: right;
    vertical-align: middle
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

.tg .tg-ffps {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 11px;
    text-align: left;
    vertical-align: top
}

.tg .tg-2rqp {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-88jz {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-s398 {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
    vertical-align: middle
}

.tg .tg-eyl8 {
    background-color: #efefef;
    border-color: inherit;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: bottom
}

.tg .tg-hfs3 {
    background-color: #d3d3d3;
    border-color: inherit;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-q546 {
    background-color: #d3d3d3;
    border-color: inherit;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-51bg {
    border-color: inherit;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
}

.tg .tg-njwd {
    border-color: inherit;
    font-size: 14px;
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

.tg .tg-9uz1 {
    background-color: #efefef;
    font-size: 11px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-86aj {
    background-color: #efefef;
    font-size: 11px;
    font-weight: bold;
    text-align: left;
    vertical-align: middle
}
</style>
';


if(isset($_POST["export"])){
//#TABLE<table class="tg" border="1">
$output .='';
$output .='<table class="tg" border="1">';

$output .='
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
    <col style="width: 80px">
    <col style="width: 80px">
    <col style="width: 100px">
    <col style="width: 100px">
</colgroup>
';

$output .='<tbody>';
//! $output .='';
$output .='
<tr>
    <td class="tg-2rqp" colspan="26" rowspan="2">แบบฟอร์มการโอนย้ายอัตรากำลังคนภายในแผนก<br><span
    style="color:#C0C0C0">Requisition of Manpower Transfer Internal Department</span></td>
</tr>
<tr>
</tr>
';

//#
$doc_id = $_POST['doc'];
$sql001 = $connDB_MTS->query("SELECT * FROM mts_document WHERE Document_num = '".$doc_id."' ");
$row001 = $sql001->fetch_array();

$output .='

<tr>
    <td class="tg-s398" colspan="12">วันที่กรอกเอกสาร Date :<a style="font-weight:normal">' .' '.substr($row001['Date'],0,10).'</a></td>
    <td class="tg-hnhj" colspan="12">เลขที่ HR:<a style="font-weight:normal">' .' '.$row001['HR_Code'].'</a></td>
    <td class="tg-88jz" colspan="2">' .' '.$row001['Form_Company'].'</td>
</tr>
';

$output .='
<tr>
    <td class="tg-eyl8" rowspan="2">ลำดับ<br>No.</td>
    <td class="tg-eyl8" rowspan="2">รหัสพนักงาน<br>Emp. Code</td>
    <td class="tg-eyl8" colspan="2" rowspan="2">ชื่อ - นามสกุล<br>Name - Surname</td>
    <td class="tg-hfs3" colspan="8">ข้อมูลปัจจุบัน / Current</td>
    <td class="tg-hfs3" colspan="9">รายการข้อมูลที่แจ้งเปลี่ยนแปลง / Detail of Change</td>
    <td class="tg-q546" colspan="3">ผู้บังคับบัญชาโดยตรง<br>Direct Superior</td>
    <td class="tg-eyl8" colspan="2" rowspan="2">สาเหตุการย้าย<br>Reason transfer</td>
</tr>
<tr>
    <td class="tg-eyl8">ระดับพนักงาน<br>Grade</td>
    <td class="tg-eyl8">ตำแหน่ง<br>Position</td>
    <td class="tg-eyl8" colspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
    <td class="tg-eyl8">รหัสหน่วยงาน<br>Section ID</td>
    <td class="tg-eyl8">ประเภทงาน<br>Type</td>
    <td class="tg-eyl8">รหัสศูนย์ต้นทุน<br>Cost center</td>
    <td class="tg-eyl8">กะ<br>Shift</td>
    <td class="tg-eyl8">ระดับพนักงาน<br>Grade</td>
    <td class="tg-eyl8">ตำแหน่ง<br>Position</td>
    <td class="tg-eyl8" colspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
    <td class="tg-eyl8">รหัสหน่วยงาน<br>Section ID</td>
    <td class="tg-eyl8">ประเภทงาน<br>Type</td>
    <td class="tg-eyl8">รหัสศูนย์ต้นทุน<br>Cost center</td>
    <td class="tg-eyl8">กะ<br>Shift</td>
    <td class="tg-eyl8">วันที่มีผลบังคับใช้ <br>Effective Date*(1)</td>
    <td class="tg-eyl8">รหัสพนักงาน<br>Emp. Code</td>
    <td class="tg-eyl8" colspan="2">ชื่อ-สกุล *(2)<br>Name-Surname</td>
</tr>
';

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
}
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
//: Convert ID > Name [ Shift ] 
$Shift2_id = $row002['mts_Shift_ID'];
$Shift_2 = $connDB_DBMC->query("SELECT DISTINCT * FROM shift WHERE Shift_ID = '".$Shift2_id."'");
$rowSH2 = $Shift_2->fetch_array();
$Shift2 = $rowSH2['Shift_name'];
//! =========================================================================================================
$output .='
<tr>
    <td class="tg-51bg">'.$i++.'</td>
    <td class="tg-51bg">'.$row002['emp_id'].'</td>
    <td class="tg-51bg" colspan="2">'.$Name.'</td>
    <td class="tg-51bg">'.$row002['Personal_grade'].'</td>
    <td class="tg-51bg">'.$row002['Position_name'].'</td>
    <td class="tg-51bg" colspan="2">'.$sc_name1.'</td>
    <td class="tg-51bg">'.$row002['Sectioncode_ID'].'</td>
    <td class="tg-51bg">'.$row002['Section_type'].'</td>
    <td class="tg-51bg">'.$row002['CostCenter_ID'].'</td>
    <td class="tg-51bg">'.$Shift1.'</td>
    <td class="tg-51bg">'.$row002['mts_Personal_grade'].'</td>
    <td class="tg-51bg">'.$row002['mts_Position_name'].'</td>
    <td class="tg-51bg" colspan="2">'.$sc_name2.'</td>
    <td class="tg-51bg">'.$row002['mts_Sectioncode_ID'].'</td>
    <td class="tg-51bg">'.$row002['mts_Section_type'].'</td>
    <td class="tg-51bg">'.$row002['mts_CostCenter_ID'].'</td>
    <td class="tg-njwd">'.$Shift2.'</td>
    <td class="tg-njwd">'.$row001['EFF_Date'].'</td>
    <td class="tg-njwd">'.$row002['Supervisor_Code'].'</td>
    <td class="tg-njwd" colspan="2">'.$Name1.'</td>
    <td class="tg-njwd" colspan="2">'.$row002['reason_tranfer'].'</td>
</tr>
';
}


$output .='
<tr>
    <td class="tg-88jz" rowspan="14"></td>
    <td class="tg-la4h" colspan="25">หมายเหตุ: Remark</td>
</tr>
<tr>
    <td class="tg-zf4g" colspan="25">*(1)แผนกต้นสังกัดหรือแผนกที่รับโอนต้องส่งเอกสารการโอนย้ายให้แผนก HR
แก้ไขข้อมูล ก่อนวันที่มีผลบังคับใช้อย่างน้อย 3 วันทำงาน หากล่าช้ากว่าวันที่ กำหนดจะมีผลบังคับใช้อีก 3
วันทำงานถัดไปจากวันที่แผนก HR ได้รับเอกสาร</td>
</tr>
<tr>
    <td class="tg-zf4g" colspan="25">Original department or new department have to submit Requisition of
Original department or new department have to submit Requisition of Manpower Transfer cross Department
to HR for edit data at least 3 working day (If submit lately, effective date will be next 3 working
days.)</td>
</tr>
<tr>
    <td class="tg-zf4g" colspan="25">*(2)กรณีจะเปลี่ยนผู้บังคับบัญชาโดยตรง ทางต้นสังกัดต้องทำการแก้ไข
Organization chart ให้ตรงตามเอกสารการโอนย้าย</td>
</tr>
<tr>
    <td class="tg-zf4g" colspan="25">( In case changing direct superior, department have to edit org. to be
directly with transference document.)</td>
</tr>
<tr>
    <td class="tg-ffps" colspan="25">*(3) แผนกต้นสังกัดส่งเอกสารที่อนุมัติเรียบร้อยแล้วให้แผนก HR Recruitment
ตรวจสอบ SAL plan กรณี Over SAL plan หรือ เพิ่มจำนวนพนักงานในประเภทงาน Indirect
แผนกที่รับโอนต้องนำเอกสารให้ประธานบริษัทเซ็นอนุมัติ</td>
</tr>
<tr>
    <td class="tg-ffps" colspan="25">Original department have to submit approved form to HR Recruitment for
checking SAL Plan (In case Over SAL plan or Increasing of Manpower in Indirect type department form must
be approved by president)</td>
</tr>
<tr>
    <td class="tg-owsj" colspan="3" rowspan="2">ต้นสังกัด<br>Current Section</td>
    <td class="tg-owsj" colspan="3">Human Resources Department</td>
    <td class="tg-owsj" rowspan="2">ต้นสังกัด<br>Current Section</td>
    <td class="tg-owsj" colspan="5">Human Resources Department Update data</td>
    <td class="tg-88jz" colspan="13" rowspan="7"></td>
</tr>
<tr>
    <td class="tg-owsj" colspan="3">Planning &amp; Recruitment</td>
    <td class="tg-owsj" colspan="2">Information Technology</td>
    <td class="tg-owsj" colspan="3">Compensation &amp; Benefit</td>
</tr>
<tr>
    <td class="tg-9uz1">ผู้ร้องขอ<br>Requester</td>
    <td class="tg-9uz1">ตรวจสอบ<br>Checked</td>
    <td class="tg-9uz1">อนุมัติ<br>Approved</td>
    <td class="tg-9uz1">ตรวจสอบ<br>Checked</td>
    <td class="tg-9uz1">SAL/JD/Type</td>
    <td class="tg-9uz1">รับทราบ<br>Acknowledge</td>
    <td class="tg-9uz1">อนุมัติ<br>Approved</td>
    <td class="tg-9uz1">แก้ไข<br>Edit</td>
    <td class="tg-9uz1">ตรวจสอบ<br>Checked</td>
    <td class="tg-9uz1">แก้ไข<br>Edit</td>
    <td class="tg-9uz1">ตรวจสอบ<br>Checked</td>
    <td class="tg-9uz1">อนุมัติ<br>Approved</td>
</tr>
';

$sqlAP01 = $connDB_MTS->query("SELECT * FROM mts_apf AS apf INNER JOIN mts_document AS doc ON apf.mtsAP_doc = doc.Document_num WHERE apf.mtsAP_doc = '".$doc_id."'");
$rowAP01 = $sqlAP01->fetch_assoc();
$SAL = $rowAP01['SAL'];

$create = $rowAP01['Create_By'];
$sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$create ."' ");
$row1 = $sql1->fetch_array();
$AP0 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
$date0 = substr($rowAP01['Date'],0,10);
if($SAL == 1){

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
}elseif($step == 3 && $group == 2){
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
}elseif($step == 5 && $group == 5){
    $date5 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP5 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 6 && $group == 5){
    $date6 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP6 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 7 && $group == 6){
    $date7 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP7 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 8 && $group == 6){
    $date8 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP8 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 9 && $group == 6){
    $date9 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP9 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
};

};

$output .='
<tr>
    <td class="tg-k34g" rowspan="2">'.$AP0.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP1.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP2.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP3.'</td>
    <td class="tg-k34g" rowspan="2">Follow</td>
    <td class="tg-k34g" rowspan="2">'.$AP4.'</td>
    <td class="tg-k34g" rowspan="2">-</td>
    <td class="tg-k34g" rowspan="2">'.$AP5.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP6.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP7.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP8.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP9.'</td>
</tr>
';

}else{

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
}elseif($step == 3 && $group == 2){
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
}elseif($step == 6 && $group == 1){
    $date6 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP01 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 7 && $group == 5){
    $date7 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP7 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 8 && $group == 5){
    $date8 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP8 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 9 && $group == 6){
    $date9 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP9 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 10 && $group == 6){
    $date10 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP10 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
}elseif($step == 11 && $group == 6){
    $date11 = $rowAP1['mtsAP_datetime'];
    $id = $rowAP1['mtsAP_empid'];
    $sql1 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$id."' ");
    $row1 = $sql1->fetch_array();
    $AP11 = $row1['Empname_engTitle'].' '.$row1['Empname_eng'].' '.$row1['Empsurname_eng'];
};

};
$output .='
<tr>
    <td class="tg-k34g" rowspan="2">'.$rowAP01['Create_By'].'</td>
    <td class="tg-k34g" rowspan="2">'.$AP1.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP2.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP3.'</td>
    <td class="tg-k34g" rowspan="2">Over</td>
    <td class="tg-k34g" rowspan="2">'.$AP4.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP01.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP7.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP8.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP9.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP10.'</td>
    <td class="tg-k34g" rowspan="2">'.$AP11.'</td>
</tr>
';

};



$output .='
<tr>
</tr>
<tr>
    <td class="tg-9uz1">Associate</td>
    <td class="tg-9uz1">T6 - Senior Staff / Supervisor above</td>
    <td class="tg-9uz1">Head of<br>sub Section<br>aboce</td>
    <td class="tg-9uz1">T6 - Senior Staff above</td>
    <td class="tg-9uz1"></td>
    <td class="tg-9uz1">Head of Section</td>
    <td class="tg-9uz1">President</td>
    <td class="tg-9uz1">T8 - Officer <br>above</td>
    <td class="tg-9uz1">T6 - Senior Staff above</td>
    <td class="tg-9uz1">T8 - Officer <br>above</td>
    <td class="tg-9uz1">T6 - Senior Staff above</td>
    <td class="tg-9uz1">Head of Section</td>
</tr>';

if($SAL == 1){
$output .='
<tr>
    <td class="tg-86aj">Date :'.$date0.'</td>
    <td class="tg-86aj">Date :'.$date1.'</td>
    <td class="tg-86aj">Date :'.$date2.'</td>
    <td class="tg-86aj">Date :'.$date3.'</td>
    <td class="tg-86aj"></td>
    <td class="tg-86aj">Date :'.$date4.'</td>
    <td class="tg-86aj">Date :'.$date5.'</td>
    <td class="tg-86aj">Date :'.$date6.'</td>
    <td class="tg-86aj">Date :'.$date7.'</td>
    <td class="tg-86aj">Date :'.$date8.'</td>
    <td class="tg-86aj">Date :'.$date9.'</td>
    <td class="tg-86aj">Date :'.$date10.'</td>
</tr>
</tbody>
';
}else{
$output .='
<tr>
    <td class="tg-86aj">Date :'.$date0.'</td>
    <td class="tg-86aj">Date :'.$date1.'</td>
    <td class="tg-86aj">Date :'.$date2.'</td>
    <td class="tg-86aj">Date :'.$date3.'</td>
    <td class="tg-86aj"></td>
    <td class="tg-86aj">Date :'.$date4.'</td>
    <td class="tg-86aj">Date :'.$date6.'</td>
    <td class="tg-86aj">Date :'.$date7.'</td>
    <td class="tg-86aj">Date :'.$date8.'</td>
    <td class="tg-86aj">Date :'.$date9.'</td>
    <td class="tg-86aj">Date :'.$date10.'</td>
    <td class="tg-86aj">Date :'.$date11.'</td>
</tr>
</tbody>
';
};

$output .='';


$output .='';
header("application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");

echo $output;
 
}
?>