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
            <th>SL NO.</th>
          <th>Trainer Name</th>
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
          $sql = "SELECT trainer_id, trainer_name FROM trainer_classes"; // Modify this query according to your table structure
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["trainer_id"] . "</td><td>" . $row["trainer_name"] . "</td></tr>";
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
