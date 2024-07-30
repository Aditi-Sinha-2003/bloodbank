<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['blood-code'];
    $bloodType = $_POST['blood-type'];
    $cost = $_POST['blood-cost'];

    $sql = "INSERT INTO Blood (Code, BloodType, Cost) VALUES ('$code', '$bloodType', '$cost')";

    if ($con->query($sql) === TRUE) {
        echo "New blood record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();

