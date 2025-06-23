<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "event_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert
$sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back or show message
echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
?>
