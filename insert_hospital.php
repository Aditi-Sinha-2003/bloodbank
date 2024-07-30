
<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['hospital-name'];
    $address = $_POST['hospital-address'];
    $phno = $_POST['hospital-phno'];
    $orders = $_POST['hospital-orders'];

    $sql = "INSERT INTO Hospital (Name, Address, Phno, Orders) VALUES ('$name', '$address', '$phno', '$orders')";

    if ($con->query($sql) === TRUE) {
        echo "New hospital added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();



