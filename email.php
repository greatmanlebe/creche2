<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle form submission
  $key = openssl_random_pseudo_bytes(32);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
 
  $encryptedDataEncoded = base64_encode($encryptedData);
  $conn = mysqli_connect('localhost', 'root', '', 'creche');
  $sql = "INSERT INTO creche (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message' )";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  // Redirect back to form page with success message
  header('Location: contact.php?success=true');
  exit;
}
?>


