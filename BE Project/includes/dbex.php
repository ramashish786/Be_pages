<?php
$dbServername = "localhost";
$dbUsername = "id16400816_beelex";
$dbPassword = "Ramashsish@436275";
//$dbName = "college";
$dbName = "id16400816_be_project";

$connect =  mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if($connect-> connect_error){
    die("Connection failed:"+ $connect-> connect_error);
}
?>
