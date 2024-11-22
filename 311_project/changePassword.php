<?php
// Include the database connection file
require_once 'connection.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Define a variable to hold messages
$message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $currentPassword = mysqli_real_escape_string($con, $_POST['current_password']);
    $newPassword = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Fetch the user's current password from the database
    $userId = $_SESSION['user_id'];
    $query = "SELECT password FROM User WHERE user_id = '$userId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Check if the current password matches
        if ($currentPassword !== $user['password']) {
            $message = "<p style='color:red;'>Current password is incorrect.</p>";
        } else {
            // Check if the new passwords match
            if ($newPassword !== $confirmPassword) {
                $message = "<p style='color:red;'>New passwords do not match.</p>";
            } else {
                // Update the password in the database
                $updateQuery = "UPDATE User SET password = '$newPassword' WHERE user_id = '$userId'";
                if (mysqli_query($con, $updateQuery)) {
                    if (mysqli_affected_rows($con) > 0) {
                        $message = "<p style='color:green;'>Password updated successfully!</p>";
                    } else {
                        $message = "<p style='color:orange;'>Password was not updated. Try again.</p>";
                    }
                } else {
                    $message = "<p style='color:red;'>Error updating password: " . mysqli_error($con) . "</p>";
                }
            }
        }
    } else {
        $message = "<p style='color:red;'>User not found or query error.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form action="ChangePassword.php" method="POST">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" required>

            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Change Password</button>
        </form>
        <div class="message"><?= $message ?></div>
    </div>
</body>
</html>
