<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_database = 'BloodBankDB';

$con = new mysqli($db_host, $db_user, $db_password, $db_database);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

?>

