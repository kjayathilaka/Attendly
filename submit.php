<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "event_db";

// Connect to DB
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$organization = $_POST['organization'];

// Insert into DB
$sql = "INSERT INTO registrations (fullname, address, age, gender, email, phone, organization)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissss", $fullname, $address, $age, $gender, $email, $phone, $organization);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to view page
header("Location: view.php");
exit();
?>
