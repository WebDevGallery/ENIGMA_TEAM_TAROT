<?php
// Database connection settings
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

// Fetch data from the database
$sql = "SELECT * FROM timetable";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable Data</title>
    <style>
        /* Add your CSS styles here */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Timetable Data</h2>
    <?php
    // Display fetched data in an HTML table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Date</th><th>9:00-10:00 AM</th><th>10:00-11:00 AM</th><th>11:00-12:00 AM</th><th>12:00-1:00 PM</th><th>1:00-2:00 AM</th><th>2:00-3:00 PM</th><th>3:00-4:00 PM</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time_9_10"] . "</td>";
            echo "<td>" . $row["time_10_11"] . "</td>";
            echo "<td>" . $row["time_11_12"] . "</td>";
            echo "<td>" . $row["time_12_1"] . "</td>";
            echo "<td>" . $row["time_1_2"] . "</td>";
            echo "<td>" . $row["time_2_3"] . "</td>";
            echo "<td>" . $row["time_3_4"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }
    ?>
</body>
</html>
