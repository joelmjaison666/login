<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!<br>";
        echo "Receipt:<br>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        echo "Registration Date: " . date("Y-m-d H:i:s");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="receipt.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Register">
</form>