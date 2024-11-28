<?php
    include('admin/inc/essentials.php');
    include('admin/inc/db_config.php');
    include('admin/inc/links.php');
?>
<?php
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>


    <style>
        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background-color: #000000;
        }

        h4 {
            background-color: #1f050a;
            color: #ffffff;
            padding: 10px;
            margin: 0;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            z-index: 0;
        }
    </style>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100 position-relative">

    <img src="https://wallpapercave.com/wp/wp10615910.jpg" alt="Background" class="background-image" />

    <div class="login-form text-center rounded shadow p-5" style="background-color: rgba(0, 0, 0, 1); max-width: 500px; position: center; z-index: 1;">
        <form class="login" action="login.php" method="POST">
            <h4 class="bg-black text-white fw-bold fs-4 oswald-regular p-3 rounded">USER LOGIN</h4>

            <div class="mb-4">
                <input name="email" required type="email" class="form-control shadow-none" placeholder="Email">
            </div>

            <div class="mb-4">
                <input name="password" required type="password" class="form-control shadow-none" placeholder="Password">
            </div>

            <button name="login" type="submit" class="btn btn-outline-light w-100">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE `email`='$email'";
    $run = mysqli_query($con,$query);

    if(mysqli_num_rows($run)>0){
        while($row = mysqli_fetch_assoc($run)){
            
            if(password_verify($password,$row['password'])){
            
                session_start();
                $_SESSION['userLogin']  = true;
                $_SESSION['userID'] = $row['user_id'];
                $_SESSION['userName'] = $row['name'];

                echo "<script>alert('Login Successful!');</script>";
                if ((isset($_SESSION['userLogin'])) && $_SESSION['userLogin'] == true){
                    redirect("index.php");
                }
                
            } else {
                session_destroy();
                echo "<script>alert('Login failed - invalid credentials!');</script>";
                redirect("index.php");
            }
            
        }
    }
}
?>

<?php include('inc/scripts.php'); ?>
</body>

</html>
