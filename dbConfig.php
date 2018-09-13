<?php

// echo "Database configuration file in php<br>";
// echo "---------------------------------------";
// echo "<br><br>";
//Database credentials

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "corephp";
 
//Connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($db->connect_error){
    printf("Database Connect failed: ".$db->connect_error);
    exit();
}
//echo "Database Connected successfully.<br>";




?>