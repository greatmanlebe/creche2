<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
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

    // Prepare the SQL statement to fetch the encrypted password from the database
    $sql = "SELECT * FROM creche WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $Password1 = $row['password'];

        // Decrypt the stored password using ROT8
       

        // Verify the provided password against the decrypted password
        if ($Password1 === $encryptedPassword) {
            echo "Login successful!<br>";
            echo "Name: " . $row['name'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            // Additional information retrieval or display can be added here
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="connection.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>