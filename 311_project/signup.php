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
        $error = "Passwords do not match!";
    } else {
        // Check if email already exists
        $checkEmailQuery = "SELECT * FROM User WHERE email = '$email'";
        $result = mysqli_query($con, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            $error = "Email already registered!";
        } else {
            // Insert the user into the database
            $insertQuery = "INSERT INTO User (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($con, $insertQuery)) {
                header("Location: login.php"); // Redirect to login page
                exit;
            } else {
                $error = "Error: " . mysqli_error($con);
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
    <style>
    /* General body styling */
    body {
        font-family: 'Roboto', Arial, sans-serif;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Form container styling */
    .container {
        width: 100%;
        max-width: 400px;
        background: linear-gradient(to bottom right, #ffffff, #e8e8e8);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2), inset 0 -1px 8px rgba(255, 255, 255, 0.7);
        animation: fadeIn 0.8s ease-in-out;
    }

    /* Heading styling */
    h2 {
        text-align: center;
        color: #333333;
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Input labels */
    label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #555555;
    }

    /* Input fields styling */
    input[type="text"], 
    input[type="email"], 
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Input fields focus effect */
    input[type="text"]:focus, 
    input[type="email"]:focus, 
    input[type="password"]:focus {
        border-color: #6a11cb;
        box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        outline: none;
    }

    /* Button styling */
    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: #ffffff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    /* Button hover effect */
    button:hover {
        background: linear-gradient(to right, #2575fc, #6a11cb);
        transform: translateY(-2px);
    }

    /* Button active effect */
    button:active {
        transform: translateY(0);
    }

    /* Error and success messages */
    .message {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .error {
        color: #e74c3c;
        font-weight: bold;
    }

    .success {
        color: #2ecc71;
        font-weight: bold;
    }

    /* Keyframe animation for fade-in effect */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Add responsive styling */
    @media (max-width: 500px) {
        .container {
            padding: 20px;
        }

        h2 {
            font-size: 20px;
        }

        button {
            font-size: 14px;
        }
    }
</style>
       


</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Sign Up</button>
        </form>
        <?php if (!empty($error)) echo "<p class='message error'>$error</p>"; ?>
    </div>
</body>
</html>
