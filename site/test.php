<?php

include '../service/DB-ConfigPDO.php';
// $n=7;
// function gen($n) {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $randomString = '';
  
//     for ($i = 0; $i < $n; $i++) {
//         $index = rand(0, strlen($characters) - 1);
//         $randomString .= $characters[$index];
//     }
  
//     return $randomString;
// }
// $f = gen($n);
// $form_number = 'FormA-'.$f.'';
// echo $form_number;

$Sh_A = $connDB_MTSPDO->prepare("SELECT * FROM shift WHERE Shift_name = 'A");
$Sh_A->execute(array("%$data%"));
// fetching rows into array
$data = $Sh_A->fetchAll();

?>

