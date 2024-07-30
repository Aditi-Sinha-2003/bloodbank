<?php
ob_start();
session_start();
require "DB_conn.php";

?>

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
?>

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

    if ($conn->query($sql) === TRUE) {
        echo "New hospital added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();
?>

<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['manager-name'];
    $phno = $_POST['manager-phno'];
    $email = $_POST['manager-email'];

    $sql = "INSERT INTO BloodBankManager (Name, Phno, Email) VALUES ('$name', '$phno', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New blood bank manager added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();

?>

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
?>

<?php
include 'DB_conn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['blood-code'];
    $bloodType = $_POST['blood-type'];
    $cost = $_POST['blood-cost'];

    $sql = "INSERT INTO Blood (Code, BloodType, Cost) VALUES ($code, '$bloodType', $cost)";

    if ($con->query($sql) === TRUE) {
        echo "New blood record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="css/main2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #ff4d4d;
    color: white;
    text-align: center;
    padding: 1em 0;
}

nav {
    background-color: #333;
    color: white;
    overflow: hidden;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0;
}

nav ul li a {
    display: block;
    padding: 1em;
    text-decoration: none;
    color: white;
}

nav ul li a:hover {
    background-color: #575757;
}

main {
    padding: 1em;
    max-width: 1200px;
    margin: 0 auto;
}

section {
    background-color: white;
    padding: 1em;
    margin-bottom: 1em;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

form label {
    margin-top: 0.5em;
}

form input, form button {
    padding: 0.5em;
    margin-top: 0.5em;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    background-color: #ff4d4d;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #e04343;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1em 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
<script type="text/javascript" src="js/script.js"></script>



</head>
<body>

<div class="col-12" style="height: 650px">
	<div id="comname">
		<i class="fa fa-balance-scale" aria-hidden="true"></i><br><br>BLOOD <b>DONATION</b>
	</div>
	<div id="nav" class="col-12">
		<ul>
        <div></div>
		  <li><a class="active" href="index.php">Home</a></li>
		  <li><a href="about.php">About</a></li>
		  <li><a href="contact.php">Contact</a></li>
		  <li><a href="register.php">Be A Donor</a></li>
		  <li><a href="change_details.php">Change Details</a></li>
		  <li><a href="find_blood.php">Find Donor</a></li>
		  

		  <?php 
		  	if(isset($_SESSION['sess_user_id'])&&!empty($_SESSION['sess_user_id'])){
				echo '<li style="background-color: rgba(255,0,0,0.5);"><a href="logout.php">Logout</a></ul>';
			}
		  ?>
          <br>
		</ul>
	</div>
	<span id="info1">Find A Blood Donor</span>
	<div id="info" class="col-12">
		<form class="option">
				<select name="bloodgroup"  onchange="ha(this);">
						<option value="">Enter Blood Group</option>
						<option value="A pos">A+</option>
						<option value="A neg">A-</option>
						<option value="B pos">B+</option>
						<option value="B neg">B-</option>
						<option value="O pos">O+</option>
						<option value="O neg">O-</option>
						<option value="AB pos">AB+</option>
						<option value="AB neg">AB-</option>
				</select>
		</form>
	</div>
	<img class="mySlides col-12" src="images/img7.jpg">
	<img class="mySlides col-12" src="images/img6.jpg">
	<img class="mySlides col-12" src="images/img5.jpg">
</div>
	<div style="margin: 0; padding: 5%; text-align: center;">
		<span style="font-size: 40px;color: rgb(168, 28, 6);font-weight: bold;">OUR VISIONS</span><br><br>
		<p style="text-align: left;"><p>To pave way for a safer and better tommorrow.</p>
		<p>Safer, by bringing blood donors and those in need to a common platform.</p>
		<p>To make the best use of contemporary technologies in delivering a promising web portal to bring together all the blood donors in Gwalior; thereby fulfilling every blood request in our city.</p>
		</p>
	</div>
	<div style="padding: 5%; text-align: center; overflow: auto;">
		<span class="col-4" style="float: left; padding: 3px;overflow: hidden;text-overflow: ellipsis;">
			<i class="fa fa-bed" aria-hidden="true"></i><br><br><br><h3>Compassion</h3> Compassinate toward the betterment of the society
		</span>
		
		<span class="col-4" style="float: right; padding: 3px;overflow: hidden;text-overflow: ellipsis;">
			<i class="fa fa-child" aria-hidden="true"></i><br><br><br><h3>Advancement</h3>Using technology for fulfilment of society need
		</span>

		<span class="col-4" style="float: right; padding: 3px;overflow: hidden;text-overflow: ellipsis;">
			<i class="fa fa-building" aria-hidden="true"></i><br><br><br><h3>Network</h3> Connecting people to a common platform
		</span>
        </div>


        <section id="blood">
            <h2>Blood Inventory</h2>
            <form action="insert_blood.php" method="post">
                <label for="blood-code">Code:</label>
                <input type="text" id="blood-code" name="blood-code">
                <label for="blood-type">Blood Type:</label>
                <input type="text" id="blood-type" name="blood-type">
                <label for="blood-cost">Cost:</label>
                <input type="number" step="0.01" id="blood-cost" name="blood-cost">
                <button type="submit">Add Blood</button>
            </form>
        </section>


        <section id="receptionists">
            <h2>Receptionists</h2>
            <form action="insert_receptionist.php" method="post">
                <label for="receptionist-name">Name:</label>
                <input type="text" id="receptionist-name" name="receptionist-name">
                <label for="receptionist-address">Address:</label>
                <input type="text" id="receptionist-address" name="receptionist-address">
                <label for="receptionist-phno">Phone:</label>
                <input type="text" id="receptionist-phno" name="receptionist-phno">
                <label for="receptionist-issues">Issues:</label>
                <input type="text" id="receptionist-issues" name="receptionist-issues">
                <button type="submit">Add Receptionist</button>
            </form>
        </section>

        <section id="bloodbanks">
            <h2>Blood Banks</h2>
            <form action="insert_bloodbank.php" method="post">
                <label for="bloodbank-bno">BNO:</label>
                <input type="text" id="bloodbank-bno" name="bloodbank-bno">
                <label for="bloodbank-name">Name:</label>
                <input type="text" id="bloodbank-name" name="bloodbank-name">
                <label for="bloodbank-orders">Orders:</label>
                <input type="text" id="bloodbank-orders" name="bloodbank-orders">
                <label for="bloodbank-bloodtype">Blood Type:</label>
                <input type="text" id="bloodbank-bloodtype" name="bloodbank-bloodtype">
                <button type="submit">Add Blood Bank</button>
            </form>
        </section>

        <section id="hospitals">
            <h2>Hospitals</h2>
            <form action="insert_hospital.php" method="post">
                <label for="hospital-name">Name:</label>
                <input type="text" id="hospital-name" name="hospital-name">
                <label for="hospital-address">Address:</label>
                <input type="text" id="hospital-address" name="hospital-address">
                <label for="hospital-phno">Phone:</label>
                <input type="text" id="hospital-phno" name="hospital-phno">
                <label for="hospital-orders">Orders:</label>
                <input type="text" id="hospital-orders" name="hospital-orders">
                <button type="submit">Add Hospital</button>
            </form>
        </section>

        <section id="managers">
            <h2>Blood Bank Managers</h2>
            <form action="insert_manager.php" method="post">
                <label for="manager-name">Name:</label>
                <input type="text" id="manager-name" name="manager-name">
                <label for="manager-phno">Phone:</label>
                <input type="text" id="manager-phno" name="manager-phno">
                <label for="manager-email">Email:</label>
                <input type="email" id="manager-email" name="manager-email">
                <button type="submit">Add Manager</button>
            </form>
        </section>


<div id="footer" class="col-12" style="margin: 0; padding: 0;overflow: auto;">
	<?php include "footer.php"; ?>
</div>







<script>carousel();

</script>

</body>


</html>