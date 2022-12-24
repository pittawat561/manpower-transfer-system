<?php 
include '../service/DB-Config.php';

$sql = $connDB_MTS->query("SELECT * FROM mts_user");
while ($role_b = $sql->fetch_array()){
    $role_a[] = $role_b;
};
foreach($role_a as $role_b) {

    if($role_b['Role'] == 1){
        //#employee
        $role1=$role_b['Emp_ID'];
        $id1 = $role_b['Role'];

    }elseif($role_b['Role'] == 2){
        //#Recruit_check
        $role2=$role_b['Emp_ID'];
        $id2 = $role_b['Role'];

    }elseif($role_b['Role'] == 3){
        //#Recruit_Acknowledge
        $role3=$role_b['Emp_ID'];
        $id3 = $role_b['Role'];

    }elseif($role_b['Role'] == 4){
        //#HR Check
        $role4=$role_b['Emp_ID'];
        $id4 = $role_b['Role'];

    }elseif($role_b['Role'] == 5){
        //#HR Approve
        $role5=$role_b['Emp_ID'];
        $id5 = $role_b['Role'];

    }elseif($role_b['Role'] == 6){
        //#HRIS Edit
        $role6=$role_b['Emp_ID'];
        $id6 = $role_b['Role'];

    }elseif($role_b['Role'] == 7){
        //#HRIS Check
        $role7=$role_b['Emp_ID'];
        $id7 = $role_b['Role'];

    }elseif($role_b['Role'] == 8){
        //#HR C&B Edit
        $role8=$role_b['Emp_ID'];
        $id8 = $role_b['Role'];

    }elseif($role_b['Role'] == 9){
        //#HR C&B Check
        $role9=$role_b['Emp_ID'];
        $id9 = $role_b['Role'];

    }elseif($role_b['Role'] == 10){
        //#HR C&B Approve
        $role10=$role_b['Emp_ID'];
        $id10 = $role_b['Role'];

    }elseif($role_b['Role'] == 11){
        //#TRF-CO.Received
        $role11=$role_b['Emp_ID'];
        $id11 = $role_b['Role'];

    }elseif($role_b['Role'] == 12){
        //#TRF-CO.Check
        $role12=$role_b['Emp_ID'];
        $id12 = $role_b['Role'];

    }elseif($role_b['Role'] == 13){
        //#TRF-CO.Approve
        $role13=$role_b['Emp_ID'];
        $id13 = $role_b['Role'];

    }elseif($role_b['Role'] == 14){
        //#Check
        $role14=$role_b['Emp_ID'];
        $id14 = $role_b['Role'];

    }elseif($role_b['Role'] == 15){
        //#Approve
        $role15=$role_b['Emp_ID'];
        $id15 = $role_b['Role'];

    }elseif($role_b['Role'] == 16){
        //#Approve
        $role16=$role_b['Emp_ID'];
        $id16 = $role_b['Role'];

    }
    


}; 
?>