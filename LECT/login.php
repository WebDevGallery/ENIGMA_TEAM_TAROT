<?php
// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "enigma"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the login form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM lect WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, fetch user data
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($input_password, $row['password'])) {
            $conn->close();
        
        // Redirect to another HTML page
        header("Location: lect.html");
        exit();
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    } else {
        // Username doesn't exist
        echo "Username not found!";
    }
    $stmt->close(); // Close prepared statement
}

// Close the database connection
$conn->close();
?>
