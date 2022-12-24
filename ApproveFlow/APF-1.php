<?php

include '../service/DB-Config.php';
include '../ApproveFlow/role.php';

$apf = $_POST['val'];
$data = $_POST['data'];
$sal = $_POST['data']['sal'];

$stpI       = $data['step']+1;
$stpII      = $data['step']+2;
$stpIII     = $data['step']+3;
$IV         = $data['step']+4;
$Bstp       = $data['step']-1;

$sql100 = $connDB_MTS->query("SELECT * FROM mts_document WHERE Document_num = '".$data['doc']."' ");
$row100 = $sql100->fetch_assoc();
$F_ID = $row100['Form_ID'];
if($F_ID == 1){

    if($apf=='rej'){
        if($data['step'] == 1){
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$data['create']."','0','1','1','".$data['doc']."','1')");
            //$connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '2'");
        }elseif($sal == 2 && $data['step'] == 6){
            $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
        }else{
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
            $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '0'");
            $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '2'");
        }
        if($data['role'] == 10){
            echo 'ref 10';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
            //$connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '2'");
        };
    }else if($apf=='app'){
        if($data['role'] == 1){
            echo'role 1';
            if($data['step'] == 0){
                echo'step 0';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '1' AND mtsAP_doc ='".$data['doc']."'"); 
                $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '0' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '1'");
                
            }elseif($data['step'] == 1){
                echo'step 1';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
            }elseif($data['step'] == 2){
                echo'step 2';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','2','".$data['doc']."', '2'),('".$stpII."','0','2','".$data['doc']."', '3')");
            }elseif($data['step'] == 5 && $data['sal'] == 2){
                echo'step 5';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$data['AP']."','".$stpI."','1','1','".$data['doc']."', '1')");
            }elseif($data['step'] == 6 && $data['sal'] == 2){
                echo'step 6';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','5','".$data['doc']."', '6'),('".$stpII."','0','5','".$data['doc']."', '7')");        
            };
        }elseif($data['role'] == 2){
            echo 'role_2';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_document SET SAL = '".$sal."' WHERE Document_num ='".$data['doc']."'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 3){
            if($sal == 1){
                echo 'role_3 SAL = 1 ';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','5','".$data['doc']."', '6'),('".$stpII."','0','5','".$data['doc']."', '7')");
            }elseif($sal == 2){
                echo 'role_3 SAL = 2 ';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$data['create']."','".$stpI."','1','1','".$data['doc']."', '1')");

            };
            
        }elseif($data['role'] == 6){
            echo 'role_6';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_document SET HR_Code = '".$data['HrCode']."' WHERE Document_num ='".$data['doc']."'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 7){
            echo 'role_7';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','6','".$data['doc']."', '8'),('".$stpII."','0','6','".$data['doc']."', '9'),('".$stpIII."','0','6','".$data['doc']."', '10')");
        }elseif($data['role'] == 8){
            echo 'role_8';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 9){
            echo 'role_9';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 10){
            echo 'role_9';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_document SET `status` = '4' WHERE Document_num ='".$data['doc']."'");
        }
        
    }else{
        echo'error';
    }

    
}//#AP FLOW 2
elseif($F_ID == 2){

}//:AP FLOW 3
elseif($F_ID == 3){
    echo 'Form 3';
    if($apf=='rej'){
        if($data['step'] == 1 ){
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$data['create']."','0','1','1','".$data['doc']."','1')");
        }elseif($data['step'] == 2){
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
        }else{
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
            $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '0'");
            $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '2'");
        }
        if($data['role'] == 10){
            echo 'ref 10';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','2','".$data['role']."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '2' WHERE mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$Bstp."' AND mtsAP_doc ='".$data['doc']."'AND mtsAP_status = '3'");
            //$connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '2'");
        };
    }elseif($apf=='app'){
        if($data['role'] == 1){
            echo 'role 1';
            if($data['step'] == 3){
                echo'step 3';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','2','".$data['doc']."', '2'),('".$stpII."','0','2','".$data['doc']."', '3')");
            }elseif($data['step'] == 9){
                echo'step 9';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','4','".$data['doc']."', '4'),('".$stpII."','0','4','".$data['doc']."', '5')");
            }elseif($data['step'] == 0){
                echo'step 0';
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '1' AND mtsAP_doc ='".$data['doc']."'"); 
                $connDB_MTS->query("DELETE FROM mts_apf WHERE mtsAP_step = '0' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status = '1'");
            }else{
                $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."')");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3' WHERE mtsAP_empid = '".$data['eid']."' AND mtsAP_step = '".$data['step']."' AND mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
                $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");    
            };
        }elseif($data['role'] == 2){
            echo 'role_2';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_document SET SAL = '".$sal."' WHERE Document_num ='".$data['doc']."'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 3){
            echo 'role_3';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$data['RECV']."','".$stpI."','1','9','".$data['doc']."', '1'),('".$data['CK1']."','".$stpII."','0','9','".$data['doc']."', '1'),('".$data['CK2']."','".$stpIII."','0','9','".$data['doc']."', '1'),('".$data['AP']."','".$IV."','0','9','".$data['doc']."', '1')");
        }elseif($data['role'] == 4){
            echo 'role_4';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");        
        }elseif($data['role'] == 5){
            echo 'role_5';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','5','".$data['doc']."', '6'),('".$stpII."','0','5','".$data['doc']."', '7')");        
        
        }elseif($data['role'] == 6){
            echo 'role_6';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_document SET HR_Code = '".$data['HrCode']."' WHERE Document_num ='".$data['doc']."'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 7){
            echo 'role_7';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("INSERT INTO mts_apf (mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role) VALUES ('".$stpI."','1','6','".$data['doc']."', '8'),('".$stpII."','0','6','".$data['doc']."', '9'),('".$stpIII."','0','6','".$data['doc']."', '10')");
        }elseif($data['role'] == 8){
            echo 'role_8';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 9){
            echo 'role_9';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '1' WHERE mtsAP_step = '".$stpI."' AND mtsAP_doc ='".$data['doc']."'");
        }elseif($data['role'] == 10){
            echo 'role_9';
            $connDB_MTS->query("INSERT INTO mts_apf_log (log_Emp_ID, log_document, log_status, log_role, log_sal) VALUES ('".$data['eid']."','".$data['doc']."','3','".$data['role']."', '".$sal."')");
            $connDB_MTS->query("UPDATE mts_apf SET mtsAP_status = '3',mtsAP_empid = '".$data['eid']."' WHERE mtsAP_doc ='".$data['doc']."' AND mtsAP_status ='1'");
            $connDB_MTS->query("UPDATE mts_document SET `status` = '4' WHERE Document_num ='".$data['doc']."'");
        }else{
            echo'error';
        }
    };
}






?>