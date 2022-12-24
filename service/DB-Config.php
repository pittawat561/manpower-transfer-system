<?php

// ini_set('display_errors', 1);
// error_reporting(0);

//! Connect Database 

$serverDB_DBMC = "localhost";
$userDB_DBMC = "AOFSERV";
$passDB_DBMC = "root123456";
$dataDB_DBMC = "DBMC";
$connDB_DBMC = mysqli_connect($serverDB_DBMC, $userDB_DBMC, $passDB_DBMC, $dataDB_DBMC);
if (!$connDB_DBMC) {
    die("Connection failed: " . mysqli_connect_error());
}

$serverDB_MTS = "localhost";
$userDB_MTS = "aps";
$passDB_MTS = "root123456";
$dataDB_MTS = "dbmts";
$connDB_MTS = mysqli_connect($serverDB_MTS, $userDB_MTS, $passDB_MTS, $dataDB_MTS);
mysqli_set_charset($connDB_MTS, "utf8");
if (!$connDB_MTS) {
    die("Connection failed: " . mysqli_connect_error());
}


//# WFH
// $serverDB_DBMC = "127.0.0.1";
// $userDB_DBMC = "root";
// $passDB_DBMC = "";
// $dataDB_DBMC = "DBMC";
// $connDB_DBMC = new mysqli($serverDB_DBMC, $userDB_DBMC, $passDB_DBMC, $dataDB_DBMC);
// if ($connDB_DBMC->connect_error) {
//     echo "Failed to connect to MySQL: " . $connDB_DBMC -> connect_error;
//     exit();
// }

// $serverDB_MTS = "127.0.0.1";
// $userDB_MTS = "root";
// $passDB_MTS = "";
// $dataDB_MTS = "DBMTS";
// $connDB_MTS = new mysqli($serverDB_MTS, $userDB_MTS, $passDB_MTS, $dataDB_MTS);
// if ($connDB_MTS->connect_error) {
//     echo "Failed to connect to MySQL: " . $connDB_MTS -> connect_error;
//     exit();
// }
