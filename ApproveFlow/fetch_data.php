<?php    
//  $connect = mysqli_connect("localhost", "root", "", "testing");  
include '../service/DB-Config.php';

 if(isset($_POST["employee_id"]))  
 {  
    $query = "SELECT * FROM mts_employee WHERE Emp_ID = '".$_POST["employee_id"]."'";   
    $result = mysqli_query($connDB_MTS, $query);  
    $row = mysqli_fetch_array($result);  
    echo json_encode($row); 
    
} 
 
 

 ?>