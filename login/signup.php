<?php
// Include the database connection file
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        // Check if email already exists
        $checkEmailQuery = "SELECT * FROM User WHERE email = '$email'";
        $result = mysqli_query($con, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "<p style='color:red;'>Email already registered!</p>";
        } else {
            // Insert the user into the database
            $insertQuery = "INSERT INTO User (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($con, $insertQuery)) {
                echo "<p style='color:green;'>Registration successful!</p>";
                header("Location: login.php"); // Redirect to login page
                exit;
            } else {
                echo "<p style='color:red;'>Error: " . mysqli_error($con) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
