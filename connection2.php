<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt the password using ROT8
    $encryptedPassword = str_rot13($password);

    // Establish the database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'creche';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to insert data into the database
    $sql = "INSERT INTO creche (name, email, password) VALUES ('$name', '$email', '$encryptedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
        // Redirect to login page
        header('Location: connection.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="POST" action="connection2.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Signup</button>
    </form>
</body>
</html>