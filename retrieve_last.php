<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robotcontrol";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the last inserted record
$sql = "SELECT * FROM direction ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of the last inserted record
  $row = $result->fetch_assoc();
  echo $row["Direction"];
} else {
  echo "0 results";
}

$conn->close();
?>
