<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['receptionist-name'];
    $address = $_POST['receptionist-address'];
    $phno = $_POST['receptionist-phno'];
    $issues = $_POST['receptionist-issues'];

    $sql = "INSERT INTO Receptionist (Name, Address, Phno, Issues) VALUES ('$name', '$address', '$phno', '$issues')";

    if ($con->query($sql) === TRUE) {
        echo "New receptionist added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();

