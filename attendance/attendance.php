<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Attendance Form</title>
</head>
<body>

<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enigma";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        $date = date("Y-m-d");

        // Insert attendance data into the database
        $sql = "INSERT INTO student_attendance (name, status, date) VALUES ('$name', '$status', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "Attendance recorded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>
    <label for="name">1jt22cs400:</label>
    <label for="present">Present:</label>
    <input type="checkbox" id="present" name="status" value="Present">

    <label for="absent">Absent:</label>
    <input type="checkbox" id="absent" name="status" value="Absent"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
$conn->close();
?>

</body>
</html>
