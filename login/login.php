<?php
// Include the database connection file
require_once 'connection.php';

// Start a session to manage user login
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find the user with the provided email and password
    $query = "SELECT * FROM User WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Store user data in session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['name'];

        // Redirect to a welcome page
        header("Location: welcome.php");
        exit;
    } else {
        echo "<p style='color:red;'>Invalid email or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</body>
</html>
