<?php
// Start a session to access user data
session_start();

// Include the database connection file
require_once 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Fetch user details from the database using the session user_id
$userId = $_SESSION['user_id'];
$query = "SELECT name, email FROM User WHERE user_id = '$userId'";
$result = mysqli_query($con, $query);

// Initialize variables
$userName = '';
$userEmail = '';

// Check if the query was successful and fetch the data
if ($result && mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    $userName = htmlspecialchars($user['name']);
    $userEmail = htmlspecialchars($user['email']);
} else {
    // Handle the case where the user is not found in the database
    $userName = 'Unknown User';
    $userEmail = 'Unknown Email';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-top: 0;
            color: #007bff;
        }

        .details {
            margin: 20px 0;
        }

        .details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align buttons to the left */
        }

        .actions a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px 0;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            text-align: center;
        }

        .actions a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $userName; ?>!</h2>
        <div class="details">
            <p><strong>Name:</strong> <?php echo $userName; ?></p>
            <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
        </div>
        <div class="actions">
            <a href="ChangePassword.php">Change Password</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
