<?php
$conn = new mysqli("localhost", "root", "", "event_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Messages</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      background: #fff;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
    }
    th {
      background:rgb(42, 197, 37);
      color: white;
    }
    tr:hover {
      background-color: #f2f2f2;
    }
    body {
      font-family: Arial;
      padding: 30px;
      background: #f0f2f5;
    }
  </style>
</head>
<body>

<h2>Submitted Contact Messages</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No messages found.</p>";
}
$conn->close();
?>
</body>
</html>