<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['manager-name'];
    $phno = $_POST['manager-phno'];
    $email = $_POST['manager-email'];

    $sql = "INSERT INTO BloodBankManager (Name, Phno, Email_id) VALUES ('$name', '$phno', '$email')";

    if ($con->query($sql) === TRUE) {
        echo "New blood bank manager added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();

