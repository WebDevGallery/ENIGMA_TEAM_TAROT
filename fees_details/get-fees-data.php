<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enigma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the fees table
$sql = "SELECT student_id, name, fees FROM fees_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $feesData = array();
  while($row = $result->fetch_assoc()) {
    $feesData[] = $row;
  }
  echo json_encode($feesData);
} else {
  echo "0 results";
}
$conn->close();
?>
