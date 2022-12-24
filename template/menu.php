<?php 
session_start();


if($objResult['Role'] == 2){
    include '../template/Role_menu/Recruit_check.php';

}else if($objResult['Role'] == 3){
    include '../template/Role_menu/Recruit_Acknowledge.php';

}else if($objResult['Role'] == 4){
    include '../template/Role_menu/HR_Check.php';

}else if($objResult['Role'] == 5){
    include '../template/Role_menu/HR_Approve.php';

}else if($objResult['Role'] == 6){
    include '../template/Role_menu/HRIS_Edit.php';

}else if($objResult['Role'] == 7){
    include '../template/Role_menu/HRIS_Check.php';

}else if($objResult['Role'] == 8){
    include '../template/Role_menu/HR_C&B_Edit.php';

}else if($objResult['Role'] == 9){
    include '../template/Role_menu/HR_C&B_Check.php';

}else if($objResult['Role'] == 10){
    include '../template/Role_menu/HR_C&B_Approve.php';

}else{
   
};



?>
