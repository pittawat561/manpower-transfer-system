<?php  
//export.php  
include "../service/DB-Config.php";
header("Content-type: text/css ; charset: UTF-8");
header('Content-type: text/csv; charset=UTF-8');  
$fileName = "mts_" . date('Y-m-d') . ".xls"; 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");

$doc = $_POST["doc"];


$output = '
<style type="text/css">
table {
    border: hidden;
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

.tg .tg-0amx {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: right;
    vertical-align: top
}

.tg .tg-oe15 {
    background-color: #ffffff;
    border-color: #ffffff;
    text-align: left;
    vertical-align: top
}

.tg .tg-w9yx {
    background-color: #ffffff;
    border-color: inherit;
    font-size: 14px;
    text-align: center;
    vertical-align: middle
}

.tg .tg-g5gc {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
    vertical-align: top
}

.tg .tg-6vwl {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 18px;
    font-weight: bold;
    position: -webkit-sticky;
    position: sticky;
    text-align: center;
    top: -1px;
    vertical-align: bottom;
    will-change: transform
}

.tg .tg-tfu0 {
    background-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    vertical-align: bottom
}

.tg .tg-x5ly {
    background-color: #ffffff;
    border-color: #ffffff;
    position: -webkit-sticky;
    position: sticky;
    text-align: left;
    top: -1px;
    vertical-align: top;
    will-change: transform
}

.tg .tg-e1jm {
    background-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-8owx {
    background-color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    text-align: left;
    vertical-align: middle
}

.tg .tg-x3r8 {
    background-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
    vertical-align: top
}

.tg .tg-8zg2 {
    background-color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    vertical-align: top
}

.tg .tg-bzmg {
    background-color: #ffffff;
    border-color: inherit;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-gwz4 {
    background-color: #ffffff;
    border-color: #ffffff;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    vertical-align: middle
}

.tg .tg-82rk {
    background-color: #ffffff;
    font-size: 12px;
    text-align: center;
    vertical-align: middle
}
</style>
';
if(isset($_POST["export"])){
$output .='';

  $output .= '
  <table class="tg" style="undefined;table-layout: fixed; width: 2370px" border = "1">
    <colgroup>
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 25px">
        <col style="width: 20px">
    </colgroup>
    <thead>
        <tr>
            <th class="tg-6vwl" colspan="94" rowspan="3">แบบฟอร์มการโอนย้ายอัตรากำลังคนภายในแผนก<br>Requisition of
                Manpower Transfer Internal Department</th>
            <th class="tg-x5ly"></th>
        </tr>
        <tr>
            <th class="tg-x5ly"></th>
        </tr>
        <tr>
            <th class="tg-x5ly"></th>
        </tr>
    </thead>
    <tbody>';

    $sql001 = $connDB_MTS->query("SELECT * FROM mts_document WHERE Document_num='$doc'");
    $row001 = $sql001->fetch_assoc();
    $date = $row001["Date"];

    
    $output .= '
        <tr>
            <td class="tg-g5gc" colspan="15">วันที่กรอกเอกสาร: '.substr($date, 0, 10).'</td>
            <td class="tg-0amx" colspan="78">เลขที่ HR : '.$row001["HR_Code"].'</td>
    
        </tr>
        <tr>
            <td class="tg-e1jm" colspan="2" rowspan="3">ลำดับ<br>No.</td>
            <td class="tg-e1jm" colspan="4" rowspan="3">รหัส<br>พนักงาน<br>Emp. Code</td>
            <td class="tg-e1jm" colspan="9" rowspan="3">ชื่อ - นามสกุล<br>Name - Surname</td>
            <td class="tg-e1jm" colspan="25">ข้อมูลปัจจุบัน<br>Current</td>
            <td class="tg-8zg2" colspan="29">รายการข้อมูลที่แจ้งเปลี่ยนแปลง<br>Detail of Change</td>
            <td class="tg-e1jm" colspan="13">ผู้บังคับบัญชาโดยตรง<br>Direct Superior</td>
            <td class="tg-e1jm" colspan="11" rowspan="3">สาเหตุการย้าย<br>Reason transfer</td>
    
        </tr>
        <tr>
            <td class="tg-tfu0" colspan="3" rowspan="2">ระดับ<br>พนักงาน<br>Grade</td>
            <td class="tg-tfu0" colspan="3" rowspan="2">ตำแหน่ง<br>Position</td>
            <td class="tg-tfu0" colspan="6" rowspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">รหัสหน่วยงาน<br>Section ID<br> </td>
            <td class="tg-tfu0" colspan="3" rowspan="2">ประเภท<br>งาน<br>Type</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">รหัสศูนย์<br>ต้นทุน<br>Cost Center</td>
            <td class="tg-tfu0" colspan="2" rowspan="2"> กะ<br>Shift</td>
            <td class="tg-tfu0" colspan="3" rowspan="2">ระดับ<br>พนักงาน<br>Grade</td>
            <td class="tg-tfu0" colspan="3" rowspan="2">ตำแหน่ง<br>Position</td>
            <td class="tg-tfu0" colspan="6" rowspan="2">ชื่อหน่วยงานตนเอง<br>Section Owner</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">รหัสหน่วยงาน<br>Section ID</td>
            <td class="tg-tfu0" colspan="3" rowspan="2">ประเภท<br>งาน<br>Type</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">รหัสศูนย์<br>ต้นทุน<br>Cost Center</td>
            <td class="tg-tfu0" colspan="2" rowspan="2">กะ<br>Shift</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">วันที่มีผล<br>บังคับใช้<br>Effective Date</td>
            <td class="tg-tfu0" colspan="4" rowspan="2">รหัส<br>พนักงาน<br>Emp. Code</td>
            <td class="tg-tfu0" colspan="9" rowspan="2">ชื่อ - นามสกุล<br>Name - Surname</td>
    
        </tr>
        <tr>
    
        </tr>
  ';
        
  $output .= '<tr>';
       

        $empdata1 = $connDB_MTS->query("SELECT * FROM mts_employee WHERE Document_num='$doc'");

        while ($row1 = $empdata1->fetch_assoc()) {
            $rows1[] = $row1;
            $i = 1;
        };
        
        foreach ($rows1 as $row1) {
            $id = $row1["emp_id"];  

            $empdata3 = $connDB_DBMC->query("SELECT * FROM employee AS emp INNER JOIN position as pos ON emp.Position_ID = pos.Position_ID WHERE Emp_ID = '$id'");
            $row3 = $empdata3->fetch_assoc();

            $ids = $row1['Supervisor_Code'];
            $empdata4 = $connDB_DBMC->query("SELECT * FROM employee AS emp INNER JOIN position as pos ON emp.Position_ID = pos.Position_ID WHERE Emp_ID = '$ids'");
            $row4 = $empdata4->fetch_assoc();

            $sql002 = $connDB_MTS->query("SELECT * FROM mts_document WHERE Document_num='$doc'");
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
            if($row1["Sectioncode_ID"] != "-"){
                $sc = $row1["Sectioncode_ID"];
                $employee_DV = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Division_id = '$sc'");
                $employee_DP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Department_id = '$sc'");
                $employee_SC = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE Section_id = '$sc'");
                $employee_SUP = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE SubSection_id = '$sc'");
                $employee_GR = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Group_id` = '$sc'");
                $employee_LINE = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM master_mapping WHERE `Line_id` = '$sc'");
                while ($row_dv = mysqli_fetch_assoc($employee_DV)) { if ($row_dv["Division"] != "") { $sc_name1 = $row_dv['Division']; } }
                while ($row_dp = mysqli_fetch_assoc($employee_DP)) { if ($row_dp["Department"] != "") { $sc_name1 = $row_dp['Department']; } }
                while ($row_sc = mysqli_fetch_assoc($employee_SC)) { if ($row_sc["Section"] != "") { $sc_name1 = $row_sc['Section']; } }
                while ($row_sup = mysqli_fetch_assoc($employee_SUP)) { if ($row_sup["SubSection"] != "") { $sc_name1 = $row_sup['SubSection']; } }
                while ($row_gr = mysqli_fetch_assoc($employee_GR)) { if ($row_gr["Group"] != "") { $sc_name1 = $row_gr['Group']; } } 
                while ($row_line = mysqli_fetch_assoc($employee_LINE)) { if ($row_line["Line"] != "") { $sc_name1 = $row_line['Line']; } }
            }else{
                $sc_name1 = "-";
            }
            
            


            $output .= '
            
                <td class="tg-w9yx" colspan="2">'.$i++.'</td>
                <td class="tg-w9yx" colspan="4">'.$row1["emp_id"].'</td>
                <td class="tg-w9yx" colspan="9">'.$row3["Empname_engTitle"].' '.$row3["Empname_eng"].' '.$row3["Empsurname_eng"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row3["Personal_grade"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row3["Position_name"].'</td>
                <td class="tg-w9yx" colspan="6">'.$sc_name.'</td>
                <td class="tg-w9yx" colspan="4">'.$row3["Sectioncode_ID"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row3["Section_type"].'</td>
                <td class="tg-w9yx" colspan="4">'.$row3["CostCenter_ID"].'</td>
                <td class="tg-w9yx" colspan="2">'.$row3["Shift_ID"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row1["Personal_grade"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row1["Position_name"].'</td>
                <td class="tg-w9yx" colspan="6">'.$sc_name1.'</td>
                <td class="tg-w9yx" colspan="4">'.$row1["Sectioncode_ID"].'</td>
                <td class="tg-w9yx" colspan="3">'.$row1["Section_type"].'</td>
                <td class="tg-w9yx" colspan="4">'.$row1["CostCenter_ID"].'</td>
                <td class="tg-w9yx" colspan="2">'.$row1["Shift_ID"].'</td>
                <td class="tg-w9yx" colspan="4">'.$row002["EFF_Date"].'</td>
                <td class="tg-w9yx" colspan="4">'.$row1["Supervisor_Code"].'</td>
                <td class="tg-w9yx" colspan="9">'.$row4["Empname_engTitle"].' '.$row4["Empname_eng"].' '.$row4["Empsurname_eng"].'</td>
                <td class="tg-w9yx" colspan="11">'.$row1["reason_tranfer"].'</td>
        
            </tr>
               
            ';

        };

    

        

            


  $output .= '

  <tr>
  <td class="tg-g5gc" colspan="94" style="padding: 50px"></td>
</tr>
<tr>
  <td class="tg-bzmg" colspan="12" rowspan="2">ต้นสังกัด<br>Current Section</td>
  <td class="tg-bzmg" colspan="12">Human Resources Department</td>
  <td class="tg-bzmg" colspan="5" rowspan="2">ต้นสังกัด<br>Current Section<br></td>
  <td class="tg-bzmg" colspan="20">Human Resources Department Update data</td>
  <td class="tg-gwz4" colspan="45" rowspan="9"></td>
</tr>
<tr>
  <td class="tg-bzmg" colspan="12">Planning &amp; Recruitment</td>
  <td class="tg-bzmg" colspan="8">Information Technology</td>
  <td class="tg-bzmg" colspan="12">Compensation &amp; Benefit</td>
</tr>
<tr>
  <td class="tg-bzmg" colspan="4" rowspan="2">ผู้ร้องขอ<br>Requster</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">ตรวจสอบ<br>Checked</td>
  <td class="tg-bzmg" colspan="4">อนุมัติ</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">ตรวจสอบ<br>Checked</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">SAL/JD/Type</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">รับทราบ<br>Acknowledge</td>
  <td class="tg-bzmg" colspan="5" rowspan="2">อนุมัติ<br>Approve</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">แก้ไข<br>Edit</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">ตรวจสอบ<br>Checked</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">แก้ไข<br>Edit</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">ตรวจสอบ<br>Checked</td>
  <td class="tg-bzmg" colspan="4" rowspan="2">อนุมัติ<br>Approve</td>
</tr>
<tr>
  <td class="tg-bzmg" colspan="4">Approve</td>
</tr>';

$id003 = $row002['Create_By'];
$sql003 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id003'");
$row003 = $sql003->fetch_assoc();

if($row002["SAL"] == 1){
    $sal = 'Follow';
    $name01 = '-';
    $date00 = '-';
}else{
    $sal = 'Over';
    $sql0 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 1 AND mtsAP_step = 5");
    $row0 = $sql0->fetch_assoc();
    $id0 = $row0['mtsAP_empid'];
    $date0 = $row0['mtsAP_datetime'];
    $sql00= $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id0'");
    $row00 = $sql00->fetch_assoc();
    $name01 = $row00["Empname_engTitle"].' '.$row00["Empname_eng"].' '.$row00["Empsurname_eng"];
    
}


$sql004 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 1 AND mtsAP_step = 1");
$row004 = $sql004->fetch_assoc();
$id04 = $row004['mtsAP_empid'];
$sql005 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id04'");
$row005 = $sql005->fetch_assoc();

$sql006 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 1 AND mtsAP_step = 2");
$row006 = $sql006->fetch_assoc();
$id05 = $row006['mtsAP_empid'];
$sql007 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id05'");
$row007 = $sql007->fetch_assoc();

$sql008 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 2");
$row008 = $sql008->fetch_assoc();
$id06 = $row008['mtsAP_empid'];
$sql009 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id06'");
$row009 = $sql009->fetch_assoc();

$sql010 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 3");
$row010 = $sql010->fetch_assoc();
$id07 = $row010['mtsAP_empid'];
$sql011 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id07'");
$row011 = $sql011->fetch_assoc();

$sql012 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 4");
$row012 = $sql012->fetch_assoc();
$id08 = $row012['mtsAP_empid'];
$sql013 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id08'");
$row013 = $sql013->fetch_assoc();

$sql014 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 6");
$row014 = $sql014->fetch_assoc();
$id09 = $row014['mtsAP_empid'];
$sql015 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id09'");
$row015 = $sql015->fetch_assoc();
$name02 = $row015["Empname_engTitle"].' '.$row015["Empname_eng"].' '.$row015["Empsurname_eng"];

$sql016 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 7");
$row016 = $sql016->fetch_assoc();
$id010 = $row016['mtsAP_empid'];
$sql017 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id010'");
$row017 = $sql017->fetch_assoc();
$name03 = $row017["Empname_engTitle"].' '.$row017["Empname_eng"].' '.$row017["Empsurname_eng"];

$sql018 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 8");
$row018 = $sql018->fetch_assoc();
$id011 = $row018['mtsAP_empid'];
$sql019 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id011'");
$row019 = $sql019->fetch_assoc();
$name04 = $row019["Empname_engTitle"].' '.$row019["Empname_eng"].' '.$row019["Empsurname_eng"];

$sql020 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 9");
$row020 = $sql020->fetch_assoc();
$id012 = $row020['mtsAP_empid'];
$sql021 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id012'");
$row021 = $sql021->fetch_assoc();
$name05 = $row021["Empname_engTitle"].' '.$row021["Empname_eng"].' '.$row021["Empsurname_eng"];

$sql022 = $connDB_MTS->query("SELECT * FROM mts_apf WHERE mtsAP_doc ='$doc' AND mtsAP_role = 10");
$row022 = $sql022->fetch_assoc();
$id013 = $row022['mtsAP_empid'];
$sql023 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '$id013'");
$row023 = $sql023->fetch_assoc();
$name06 = $row023["Empname_engTitle"].' '.$row023["Empname_eng"].' '.$row023["Empsurname_eng"];


$output .='
<tr>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$row003["Empname_engTitle"].' '.$row003["Empname_eng"].' '.$row003["Empsurname_eng"].'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$row005["Empname_engTitle"].' '.$row005["Empname_eng"].' '.$row005["Empsurname_eng"].'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$row007["Empname_engTitle"].' '.$row007["Empname_eng"].' '.$row007["Empsurname_eng"].'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$row009["Empname_engTitle"].' '.$row009["Empname_eng"].' '.$row009["Empsurname_eng"].'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$sal.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$row011["Empname_engTitle"].' '.$row011["Empname_eng"].' '.$row011["Empsurname_eng"].'</td>
  <td class="tg-82rk" colspan="5" rowspan="2">'.$name01.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$name02.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$name03.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$name04.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$name05.'</td>
  <td class="tg-82rk" colspan="4" rowspan="2">'.$name06.'</td>
</tr>';

$output .='
<tr>
</tr>
<tr>
  <td class="tg-82rk" colspan="4" rowspan="2">Associate</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T6 - Senior Staff / Supervisor<br>above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">Head of <br>Sub Section<br>above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T6 - Senior Staff above</td>
  <td class="tg-82rk" colspan="4" rowspan="2"></td>
  <td class="tg-82rk" colspan="4" rowspan="2">Head of Section</td>
  <td class="tg-82rk" colspan="5" rowspan="2">President</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T8 - Officer above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T6 - Senior Staff above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T8 - Officer above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">T8 - Officer above</td>
  <td class="tg-82rk" colspan="4" rowspan="2">Head of Section</td>
</tr>
<tr>
</tr>
<tr>
  <td class="tg-8owx" colspan="4">Date:'.substr($date, 0, 10).'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row004['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row006['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row008['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4"></td>
  <td class="tg-8owx" colspan="4">Date:'.$row010['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="5">Date:'.$date00.'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row014['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row016['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row018['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row020['mtsAP_datetime'].'</td>
  <td class="tg-8owx" colspan="4">Date:'.$row022['mtsAP_datetime'].'</td>
</tr>

</tbody>
</table>
  
  ';







//   header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); 
//   header("Content-Disposition: attachment; filename=\"$fileName\""); 

//   header("Content-Type: application/vnd.ms-excel"); 
//   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//   header('Content-Disposition: attachment; filename=Test.xlsx');
  echo $output;
 
}
?>