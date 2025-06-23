<?php
$conn = new mysqli("localhost", "root", "", "event_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM registrations ORDER BY registered_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 10px 15px;
      border: 1px solid #ddd;
    }
    th {
      background:rgb(74, 226, 87);
      color: #fff;
    }
    tr:hover {
      background: #f1f1f1;
    }
    body {
      font-family: Arial;
      background: #f5f7fa;
      padding: 40px;
    }
  </style>
</head>
<body>

<h2>Event Registration Submissions</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Organization</th>
            <th>Registered At</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['address']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['organization']}</td>
                <td>{$row['registered_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No data found.</p>";
}
$conn->close();
?>

</body>
</html>
