<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trainer Classes Information</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 60%;
      margin: 20px auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Trainer Classes Information</h2>
    <table>
      <thead>
        <tr>
          <th>Trainer Name</th>
          <th>Classes Taken</th>
          <th>Payment Per Session</th>
          <th>Total Payable</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // PHP code to retrieve data from the database and display it
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
          $sql = "SELECT trainer_name, classes_taken, pay_per_class, total_payable FROM trainer_classes"; // Modify this query according to your table structure
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["trainer_name"] . "</td><td>" . $row["classes_taken"] . "</td></td>". $row["pay_per_class"]. "</td></td>". $row["total_payable"] . "</td></tr>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>
