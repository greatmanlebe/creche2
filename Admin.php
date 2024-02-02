<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="img/logo.png" rel="icon">
  <title>Data Display Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;t-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    @media (max-width: 600px) {
      table {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "creche";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the password and ID are provided
if (isset($_POST['password']) ) {
    $submittedPassword = $_POST['password'];
   

    // Prepare and execute the SQL query to retrieve the stored password
    $sql = "SELECT password FROM creche WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Compare the submitted password with the stored password
        if ($submittedPassword === $storedPassword) {
            // Passwords match, retrieve the information

            // Prepare and execute the SQL query to retrieve the information
            $sql = "SELECT * FROM creche WHERE id != 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table>";
              echo "<tr><th>Name</th><th>Email</th> <th>Subject</th><th>Message</th><th>Password</th></tr>";
              
              while ($row = $result->fetch_assoc()) {
                  $name = $row["name"];
                  $email = $row["email"];
                  $subject = $row["subject"];
                  $message = $row["message"];
                  $password = $row["password"];
              echo "<h1>Datas</h1>";
                  echo "<tr>";
                  echo "<td><center>$name</center></td>";
                  echo "<td><center>$email</center></td>";
                  echo "<td><center>$subject</center></td>";
                  echo "<td><center>$message</center></td>";
                  echo "<td><center>$password</center></td>";
                  echo "</tr>";
              
              }
              echo "</table>";
                }
            else {
                echo "No results found.";
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "ID not found.";
    }
} else {
    echo "Please provide a password and ID.";
}

// Close the database connection
$conn->close();
?>