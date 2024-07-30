<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bno = $_POST['bloodbank-bno'];
    $name = $_POST['bloodbank-name'];
    $orders = $_POST['bloodbank-orders'];
    $bloodtype = $_POST['bloodbank-bloodtype'];

    $sql = "INSERT INTO BloodBank (BNO, Name, Orders, BloodType) VALUES ('$bno', '$name', '$orders', '$bloodtype')";

    if ($con->query($sql) === TRUE) {
        echo "New blood bank added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();
