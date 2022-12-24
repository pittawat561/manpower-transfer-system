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
(mtsAP_empid)
VALUES ($CHQ),
($AP);

";



for($count = 0; $count<count($_POST['hidden_Emp_ID']); $count++)
{ 
	include'Function_insert.php';
	$CHQ = $_POST['Checked1'];
	$AP  = $_POST['Approved1'];
	
	$data = array(

		':Emp_ID'			      	=>	$_POST['hidden_Emp_ID'][$count],
		':psn_gr'			      	=>	$_POST['hidden_psn_gr'][$count],
		':pos_name'			      	=>	$_POST['hidden_pos_name'][$count],
		':company'					=>	$_POST['hidden_company'][$count],
		':dp_name'				  	=>	$dep,
		':sc_name'			      	=>	$sc_name,
		':sc_code'			      	=>	$_POST['hidden_sc_code'][$count],
		':sc_type'			      	=>	$_POST['hidden_sc_type'][$count],
		':CostCenter_ID'	      	=>	$_POST['hidden_CostCenter_ID'][$count],
		':shift'			      	=>	$SFT2,
		':mts_psn_gr'		      	=>	$_POST['hidden_mts_psn_gr'][$count],
		':mts_pon_name'		   	  	=>	$_POST['hidden_mts_pon_name'][$count],
		':mts_company'				=>	$_POST['hidden_mts_company'][$count],
		':mts_dp_name'				=>	$dep_new,
		':mts_scc_id'		      	=>	$_POST['hidden_mts_scc_id'][$count],
		':mts_sc_type'		      	=>	$_POST['hidden_mts_sc_type'][$count],
		':mts_cc_id'		      	=>	$_POST['hidden_mts_cc_id'][$count],
		':mts_sf_name'		      	=>	$SFT1,
		':eff_date'			      	=>	$_POST['hidden_eff_date'][$count],
		':Supervisor_Code'	  	  	=>	$_POST['hidden_Supervisor_Code'][$count],
		':reason'			      	=>	$_POST['hidden_reason'][$count],
    	':create'			      	=>	$_POST['create'][$count],
    	':form_type'			  	=>	$_POST['form_type'][$count],


	);
	$statement = $connDB_MTSPDO->prepare($query);
	$statement->execute($data);
}








?>