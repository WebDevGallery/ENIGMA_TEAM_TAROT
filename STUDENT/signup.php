<?php
// Establish connection to MySQL database
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "enigma";  // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    // You might want to perform validation/sanitization here
    
    // Insert user data into the database
    $sql = "INSERT INTO student (username, password , name) VALUES ('$username', '$password', '$name')";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        
        // Redirect to another HTML page
        header("Location: student.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
