<?php 

$servername = "localhost";
$database = "studenten"; //name of database 
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
?>