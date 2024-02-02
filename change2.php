<?php
// Retrieve the form data

$password= $_POST['password'];

// Sanitize the form data (optional but highly recommended)



// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creche";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Formulate the SQL update query
$updateQuery = "UPDATE creche SET password = '$password' WHERE id = 1";

// Execute the query
$result = $conn->query($updateQuery);

// Check if the update was successful
if ($conn->affected_rows > 0) {
    echo "Data updated successfully.";
} else {
    echo "No records found for the specified ID.";
}
header('Location: Admin1.php');
// Close the database connection
$conn->close();
?>
