<?php

include '../../service/DB-ConfigPDO.php';
include "../../service/DB-Config.php";

//: เพิ่มลำดับฟอร์ม
$fetch_num = mysqli_query($connDB_MTS,"SELECT MAX(Document_num) FROM mts_document");
$row_num=mysqli_fetch_array($fetch_num);
$num = $row_num['MAX(Document_num)']+1;


$query = "
INSERT INTO MTS_employee
(Emp_ID, Personal_grade, Position_name, Company_ID, Department_ID, Sectioncode_ID, Section_type, CostCenter_ID, Shift_ID, Supervisor_Code, reason_tranfer, Document_num)
VALUES (:Emp_ID, :mts_psn_gr, :mts_pon_name, :mts_company, :mts_dp_name, :mts_scc_id, :mts_sc_type, :mts_cc_id, :mts_sf_name, :Supervisor_Code, :reason, $num);

INSERT INTO mts_previousinfo
(Emp_ID, Personal_grade, Position_name, Company_ID, Department_ID, Section, Sectioncode_ID, Section_type, CostCenter_ID, Shift_ID, Document_num) 
VALUES (:Emp_ID, :psn_gr, :pos_name, :company, :dp_name, :sc_name, :sc_code, :sc_type, :CostCenter_ID, :shift, $num);

INSERT INTO mts_document
(Document_num, Form_type, Create_by, EFF_Date)
VALUES ($num, :form_type, :create, :eff_date);

INSERT INTO mts_apf
(mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_doc, mtsAP_group)
VALUES (:CHQ1, '1', '1', $num,'1'),(:CHQ2, '2', '0', $num,'1'),(:AP, '3', '0', $num,'1');

";



for($count = 0; $count<count($_POST['hidden_Emp_ID']); $count++)
{ 
	//: Convert ID > Name [ Shift ] 
	$Shift_id       = $_POST['hidden_mts_sf_name'][$count];
	$resultSFT1 = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM shift WHERE Shift_name = '".$Shift_id."'");
	$rowSFT1    = mysqli_fetch_array($resultSFT1);
	$SFT1       = $rowSFT1['Shift_ID'];
	//: Convert ID > Name [ Shift ]
	$SFT2 = $_POST['hidden_shift'][$count];
	$resultSFT2 = mysqli_query($connDB_DBMC, "SELECT DISTINCT * FROM shift WHERE Shift_name = '".$SFT2."'");
	$rowSFT2    = mysqli_fetch_array($resultSFT2);
	$SFT2       = $rowSFT2['Shift_ID'];
	//: Convert ID > Name [ Section ]
	$sc = $_POST['hidden_sc_name'][$count];
	$fetch_DV     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Division` = '$sc'");
	while ($rowdv = mysqli_fetch_assoc($fetch_DV)) {
		if ($rowdv["Division_id"] != "") {
			$sc_name = $rowdv['Division_id'];
		}
	}
	$fetch_DP     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Department` = '$sc'");
	while ($rowdp = mysqli_fetch_assoc($fetch_DP)) {
		if ($rowdp["Department_id"] != "") {
			$sc_name = $rowdp['Department_id'];
		}
	}
	$fetch_SC     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Section` = '$sc'");
	while ($rowSc = mysqli_fetch_assoc($fetch_SC)) {
		if ($rowSc["Section_id"] != "") {
			$sc_name = $rowSc['Section_id'];
		}
	}
	$fetch_SUP    =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `SubSection` = '$sc'");
	while ($rowSup = mysqli_fetch_assoc($fetch_SUP)) {
		if ($rowSup["SubSection_id"] != "") {
			$sc_name = $rowSup['SubSection_id'];
		}
	}
	$fetch_GR     =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Group` = '$sc'");  
	while ($rowGr = mysqli_fetch_assoc($fetch_GR)) {
		if ($rowGr["Group_id"] != "") {
			$sc_name = $rowGr['Group_id'];
		}
	}
	$fetch_Line   =  mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping WHERE `Line` = '$sc'");
	while ($rowLine = mysqli_fetch_assoc($fetch_Line)) {
		if ($rowLine["Line_id"] != "") {
			$sc_name = $rowLine['Line_id'];
		}
	}
	
	$data = array(

		':Emp_ID'			      	=>	$_POST['hidden_Emp_ID'][$count],
		':psn_gr'			      	=>	$_POST['hidden_psn_gr'][$count],
		':pos_name'			      	=>	$_POST['hidden_pos_name'][$count],
        ':company'                  =>  $_POST['hidden_company'][$count],
        ':dp_name'                  =>  $_POST['hidden_dp_name'][$count],
		':sc_name'			      	=>	$sc_name,
		':sc_code'			      	=>	$_POST['hidden_sc_code'][$count],
		':sc_type'			      	=>	$_POST['hidden_sc_type'][$count],
		':CostCenter_ID'	      	=>	$_POST['hidden_CostCenter_ID'][$count],
		':shift'			      	=>	$SFT2,
		':mts_psn_gr'		      	=>	$_POST['hidden_mts_psn_gr'][$count],
		':mts_pon_name'		   	  	=>	$_POST['hidden_mts_pon_name'][$count],
        ':mts_company'              =>  $_POST['hidden_mts_company'][$count],
        ':mts_dp_name'              =>  $_POST['hidden_mts_dp_name'][$count],
		':mts_scc_id'		      	=>	$_POST['hidden_mts_scc_id'][$count],
		':mts_sc_type'		      	=>	$_POST['hidden_mts_sc_type'][$count],
		':mts_cc_id'		      	=>	$_POST['hidden_mts_cc_id'][$count],
		':mts_sf_name'		      	=>	$SFT1,
		':eff_date'			      	=>	$_POST['hidden_eff_date'][$count],
		':Supervisor_Code'	  	  	=>	$_POST['hidden_Supervisor_Code'][$count],
		':reason'			      	=>	$_POST['hidden_reason'][$count],
    	':create'			      	=>	$_POST['create'][$count],
    	':form_type'			  	=>	$_POST['form_type'][$count],
		':CHQ1'			  			=>	$_POST['CHQ1'][$count],
        ':CHQ2'			  			=>	$_POST['CHQ2'][$count],
		':AP'			  			=>	$_POST['AP'][$count],
        


	);
	$statement = $connDB_MTSPDO->prepare($query);
	$statement->execute($data);
}








?>