<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST['date'];
    $time_9_10 = $_POST['D1'];
    $time_10_11 = $_POST['D2'];
    $time_11_12 = $_POST['D3'];
    $time_12_1 = $_POST['D4'];
    $time_1_2 = $_POST['D5'];
    $time_2_3 = $_POST['D6'];
    $time_3_4 = $_POST['D7'];

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

    // Prepare and execute SQL INSERT statement
    $sql = "INSERT INTO timetable (date, time_9_10, time_10_11, time_11_12, time_12_1, time_1_2, time_2_3, time_3_4) 
            VALUES ('$date', '$time_9_10', '$time_10_11', '$time_11_12', '$time_12_1', '$time_1_2', '$time_2_3', '$time_3_4')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
