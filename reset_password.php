<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Password reset successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="reset_password.php">
    Email: <input type="email" name="email" required><br>
    New Password: <input type="password" name="new_password" required><br>
    <input type="submit" value="Reset Password">
</form>