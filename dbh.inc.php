
<!--don't need of including of php closing tag here bcoz it is pure php -->
<!-- connection to the database-->
<?php


$dbServername = "localhost";
$dbUsername ="root";
$dbPassword = "";
$dbName ="online food ordering";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
