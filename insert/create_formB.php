<?php

include '../service/DB-ConfigPDO.php';


$query = "
INSERT INTO MTS_employee
(Emp_ID, mts_Personal_grade, mts_Position_name, mts_Department_ID, mts_Sectioncode_ID, mts_Section_type, mts_CostCenter_ID, mts_Shift_ID, Supervisor_Code, reason_tranfer, Document_num)
VALUES (:Emp_ID, :mts_psn_gr, :mts_pon_name, :mts_dp_name, :mts_scc_id, :mts_sc_type, :mts_cc_id, :mts_sf_name, :Supervisor_Code, :reason, :form_number);

INSERT INTO mts_previousinfo
(Emp_ID, Personal_grade, Position_name, Department_ID, Sectioncode_ID, Section_type, CostCenter_ID, Shift_ID, Document_num) 
VALUES (:Emp_ID, :psn_gr, :pos_name, :dp_name, :sc_code, :sc_type, :CostCenter_ID, :shift, :form_number);

INSERT INTO mts_document
(Document_num, Form_ID, Create_By, EFF_Date, Form_Company)
VALUES (:form_number, :form_id, :create, :eff, :FCOM);

INSERT INTO mts_apf
(mtsAP_empid, mtsAP_step, mtsAP_status, mtsAP_group, mtsAP_doc, mtsAP_role)
VALUES (:CHQ1, '1', '1', '1' ,:form_number, '14'),(:CHQ2, '2', '0', '1' ,:form_number, '14'),(:AP, '3', '0', '1' ,:form_number, '15');

";

for($count = 0; $count<count($_POST['hidden_Emp_ID']); $count++)
{ 
	include 'convert_shift.php';
    include 'convert.php';
	
	$data = array(

		':Emp_ID'			      	=>	$_POST['hidden_Emp_ID'][$count],
		':psn_gr'			      	=>	$_POST['hidden_psn_gr'][$count],
		':pos_name'			      	=>	$_POST['hidden_pos_name'][$count],
        ':dp_name'                  =>  $dep,
		':sc_code'			      	=>	$_POST['hidden_sc_code'][$count],
		':sc_type'			      	=>	$_POST['hidden_sc_type'][$count],
		':CostCenter_ID'	      	=>	$_POST['hidden_CostCenter_ID'][$count],
		':mts_psn_gr'		      	=>	$_POST['hidden_mts_psn_gr'][$count],
		':mts_pon_name'		   	  	=>	$_POST['hidden_mts_pon_name'][$count],
        ':mts_dp_name'              =>  $dep_new,
		':mts_scc_id'		      	=>	$_POST['hidden_mts_scc_id'][$count],
		':mts_sc_type'		      	=>	$_POST['hidden_mts_sc_type'][$count],
		':mts_cc_id'		      	=>	$_POST['hidden_mts_cc_id'][$count],
        ':Supervisor_Code'	  	  	=>	$_POST['hidden_Supervisor_Code'][$count],
		':reason'			      	=>	$_POST['hidden_reason'][$count],
		':mts_sf_name'		      	=>	$SFT1,
        ':shift'			      	=>	$SFT2,
        ':form_number'			  	=>	$_POST['form_number'],
        ':form_id'			  	    =>	$_POST['form_type'],
        ':create'			      	=>	$_POST['create'],
		':eff'			      	    =>	$_POST['hidden_eff_date'][$count],
		':CHQ1'			  			=>	$_POST['CHQ1'],
        ':CHQ2'			  			=>	$_POST['CHQ2'],
		':AP'			  			=>	$_POST['AP'],
		':FCOM'						=> $_POST['form_company'],

	);
	$statement = $connDB_MTSPDO->prepare($query);
	$statement->execute($data);
}








?>