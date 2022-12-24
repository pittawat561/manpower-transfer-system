<?php

//! Connect Database 

$serverDB_MTSPDO = "localhost";
$userDB_MTSPDO = "aps";
$passDB_MTSPDO = "root123456";
$dataDB_MTSPDO = "dbmts";
try {
	$connDB_MTSPDO = new PDO("mysql:host=$serverDB_MTSPDO; dbname=$dataDB_MTSPDO", "$userDB_MTSPDO", "$passDB_MTSPDO");
	$connDB_MTSPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	//echo "Connected successfully";
} catch (PDOException $MTSPDO) {
     echo "Connection failed: " . $MTSPDO->getMessage();
    echo "Database connection failed.";  
}

//*** CONDB-2

// $serverDB_MTSPDO = "localhost";
// $userDB_MTSPDO = "root";
// $passDB_MTSPDO = "";
// $dataDB_MTSPDO = "dbmts";
// try {
// 	$connDB_MTSPDO = new PDO("mysql:host=$serverDB_MTSPDO; dbname=$dataDB_MTSPDO", "$userDB_MTSPDO", "$passDB_MTSPDO");
// 	$connDB_MTSPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  	//echo "Connected successfully";
// } catch (PDOException $MTSPDO) {
//      echo "Connection failed: " . $MTSPDO->getMessage();
//     echo "Database connection failed.";  
// }






?>