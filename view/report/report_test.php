<?php  
//export.php  

$fileName = "mts_" . date('Y-m-d') . ".xls"; 
// header("Content-type: text/css ; charset: UTF-8");
// header("Content-type: text/csv; charset=UTF-8");  

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
    font-weight: bold;
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
    font-size: 11px;
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
    vertical-align: middle
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
    vertical-align: middle
}

.tg .tg-njwd {
    border-color: inherit;
    font-size: 14px;
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
    <col style="width: 100px">
    <col style="width: 100px">
    <col style="width: 100px">
    <col style="width: 100px">
</colgroup>
';

$output .='<tbody>';

$output .='
<tr>
    <td class="tg-2rqp" colspan="26" rowspan="2">แบบฟอร์มการโอนย้ายอัตรากำลังคนภายในแผนก<br><span
    style="color:#C0C0C0">Requisition of Manpower Transfer Internal Department</span></td>
</tr>
<tr>
</tr>
<tr>
    <td class="tg-s398" colspan="12">วันที่กรอกเอกสาร Date :</td>
    <td class="tg-hnhj" colspan="12">เลขที่ HR: </td>
    <td class="tg-88jz" colspan="2"></td>
</tr>
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

$output .='
<tr>
    <td class="tg-51bg">1</td>
    <td class="tg-51bg">TN00062</td>
    <td class="tg-51bg" colspan="2">Mr. Pittawat Kakkaew</td>
    <td class="tg-51bg">T5</td>
    <td class="tg-51bg">Assistant Manager</td>
    <td class="tg-51bg" colspan="2">Spare parts/ Oil stock</td>
    <td class="tg-51bg">SDM-SB0043</td>
    <td class="tg-51bg">Sub Section</td>
    <td class="tg-51bg">6100623</td>
    <td class="tg-51bg">A</td>
    <td class="tg-51bg"></td>
    <td class="tg-51bg"></td>
    <td class="tg-51bg" colspan="2"></td>
    <td class="tg-51bg"></td>
    <td class="tg-51bg"></td>
    <td class="tg-51bg"></td>
    <td class="tg-njwd"></td>
    <td class="tg-njwd"></td>
    <td class="tg-njwd"></td>
    <td class="tg-njwd" colspan="2"></td>
    <td class="tg-njwd" colspan="2"></td>
</tr>
';

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

$output .='
<tr>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
    <td class="tg-k34g" rowspan="2"></td>
</tr>
';

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
</tr>
<tr>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj"></td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
    <td class="tg-86aj">Date :</td>
</tr>
</tbody>
';


$output .='';


$output .='';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
echo $output;
 
}
?>