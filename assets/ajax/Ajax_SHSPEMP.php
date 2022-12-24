<?php
include "../../service/DB-Config.php";

  if (isset($_POST['function']) && $_POST['function'] == 'Supervisor_Code') {
  	$SUPID = $_POST['id'];
    $resultSUPID = mysqli_query($connDB_DBMC, "SELECT * FROM employee WHERE Emp_ID='$SUPID'");
    $rowSUPID=mysqli_fetch_array($resultSUPID);
    echo $supname = $rowSUPID['Empname_engTitle'].' '.$rowSUPID['Empname_eng'].' '.$rowSUPID['Empsurname_eng'];

  }elseif(isset($_POST['function']) && $_POST['function'] == 'position'){
    $SUPID = $_POST['id'];
    $resultSUPID = mysqli_query($connDB_DBMC, "SELECT * FROM employee AS emp INNER JOIN position AS pos ON emp.Position_ID = pos.Position_ID WHERE Emp_ID='$SUPID'");
    $rowSUPID=mysqli_fetch_array($resultSUPID);
    if($rowSUPID['Position_name'] == ""){
      echo "-";
    }else{
      echo $supname = $rowSUPID['Position_name'];
    };
  };

  if (isset($_POST['function']) && $_POST['function'] == 'SHSCNAME') {
  	if($_POST['id'] != "-"){
    $sc = $_POST['id'];
    $fetch_dv = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Division_id = '".$sc."'");
    $fetch_dp = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Department_id = '".$sc."'");
    $fetch_sc = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Section_id = '".$sc."'");
    $fetch_sub = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  SubSection_id = '".$sc."'");
    $fetch_gr = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Group_id = '".$sc."'");  
    $fetch_line = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Line_id = '".$sc."'"); 
    
    while ($rowdv = mysqli_fetch_assoc($fetch_dv)){
      if($rowdv["Division"] != ""){
      $sc_name = $rowdv['Division'];
      }
    }
    while ($rowdp = mysqli_fetch_assoc($fetch_dp)){
      if($rowdp["Department"] != ""){
      $sc_name = $rowdp['Department'];
      }
    }
    while ($row1 = mysqli_fetch_assoc($fetch_sc)){
      if($row1["Section"] != ""){
      $sc_name = $row1['Section'];
      }
    }
    while ($row2 = mysqli_fetch_assoc($fetch_sub)){
      if($row2["SubSection"] != ""){
      $sc_name = $row2['SubSection'];
      }
    }
    while ($row3 = mysqli_fetch_assoc($fetch_gr)){
      if($row3["Group"] != ""){
      $sc_name = $row3['Group'];
      }
    }
    while ($row4 = mysqli_fetch_assoc($fetch_line)){
      if($row4["Line"] != ""){
      $sc_name = $row4['Line'];
      }
    }
    echo  $sc_name;
  }else{
    echo  "-";
  }
    
  }

  if (isset($_POST['function']) && $_POST['function'] == 'SHDPNAME') {
  	$dp = $_POST['id'];
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Section_id = '".$dp."'");
    $fetch_sub = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  SubSection_id = '".$dp."'");
    $fetch_gr = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Group_id = '".$dp."'");  
    $fetch_line = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Line_id = '".$dp."'"); 
    
    while ($row1 = mysqli_fetch_assoc($fetch)){
      $dp_name = $row1['Department'];
    }
    while ($row2 = mysqli_fetch_assoc($fetch_sub)){
      if($row2["Department"] != ""){
      $dp_name = $row2['Department'];
      }
    }
    while ($row3 = mysqli_fetch_assoc($fetch_gr)){
      if($row3["Department"] != ""){
      $dp_name = $row3['Department'];
      }
    }
    while ($row4 = mysqli_fetch_assoc($fetch_line)){
      if($row4["Department"] != ""){
      $dp_name = $row4['Department'];
      }
    }
    echo $dp_name;
  }
  if (isset($_POST['function']) && $_POST['function'] == 'SHCOMPANY') {
  	$company = $_POST['id'];
    $fetch = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Section_id = '".$company."'");
    $fetch_sub = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  SubSection_id = '".$company."'");
    $fetch_gr = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Group_id = '".$company."'");  
    $fetch_line = mysqli_query($connDB_DBMC,"SELECT DISTINCT * FROM master_mapping  WHERE  Line_id = '".$company."'"); 
    
    while ($row1 = mysqli_fetch_assoc($fetch)){
      $company_name = $row1['Company_id'];
    }
    while ($row2 = mysqli_fetch_assoc($fetch_sub)){
      if($row2["Company_id"] != ""){
      $company_name = $row2['Company_id'];
      }
    }
    while ($row3 = mysqli_fetch_assoc($fetch_gr)){
      if($row3["Company_id"] != ""){
      $company_name = $row3['Company_id'];
      }
    }
    while ($row4 = mysqli_fetch_assoc($fetch_line)){
      if($row4["Company_id"] != ""){
      $company_name = $row4['Company_id'];
      }
    }
    echo $company_name;

  }




  








  














  
?>