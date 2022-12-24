<?php
$n=10;
function gen($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}
$f = gen($n);
$formA_number = 'FormA_'.$f.'';
$formB_number = 'FormB_'.$f.'';
$formC_number = 'FormC_'.$f.'';

// echo $formC_number;
?>

